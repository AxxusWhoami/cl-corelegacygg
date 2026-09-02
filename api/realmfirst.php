<?php
// Endpoint que obtiene los "Primeros del Reino" desde la base de datos de acore.
// - Peticiones web normales: leen SIEMPRE de Redis (respuesta instantánea).
// - Peticiones con ?refresh=1: consultan la base de datos, actualizan Redis y devuelven el resultado.
//   El cron horario debe llamar a /api/realmfirst.php?refresh=1
// PHP 7.4 · mysqli · Redis (caché vía Unix socket)

declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');
header('X-Content-Type-Options: nosniff');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Client-Info, Apikey');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'message' => 'Método no permitido.']);
    exit;
}

require __DIR__ . '/../params.php';

function respond(int $status, array $payload): void
{
    http_response_code($status);
    echo json_encode($payload, JSON_UNESCAPED_UNICODE);
    exit;
}

// Cargar el mapeo de logros desde el JSON estático (ID => datos del logro).
$achievementsMap = [];
$mapFile = __DIR__ . '/../assets/icons/realm-first-raids.json';
if (is_file($mapFile)) {
    $raw = file_get_contents($mapFile);
    if ($raw !== false) {
        $decoded = json_decode($raw, true);
        if (is_array($decoded)) {
            foreach ($decoded as $entry) {
                $id = (int) $entry['achievement_id'];
                $achievementsMap[$id] = $entry;
            }
        }
    }
}

// IDs de logros Realm First de WotLK 3.3.5a (achievement ID => etiqueta).
// Se usa el JSON estático como fuente principal; este array es fallback.
$REALM_FIRST_IDS = [
    457  => 'first_level_80',
    461  => 'first_dk_80',
    1400 => 'first_raid_malygos',
    456  => 'first_raid_sartharion',
    1402 => 'first_raid_naxxramas',
    1463 => 'first_northrend_vanguard',
    460  => 'first_mage_80',
    465  => 'first_paladin_80',
    1406 => 'first_draenei_80',
    464  => 'first_priest_80',
    1405 => 'first_bloodelf_80',
    458  => 'first_rogue_80',
    467  => 'first_shaman_80',
    463  => 'first_warlock_80',
    459  => 'first_warrior_80',
    466  => 'first_druid_80',
    462  => 'first_hunter_80',
    1407 => 'first_dwarf_80',
    1404 => 'first_gnome_80',
    1408 => 'first_human_80',
    1409 => 'first_nightelf_80',
    1410 => 'first_orc_80',
    1411 => 'first_tauren_80',
    1412 => 'first_troll_80',
    1413 => 'first_undead_80',
    1415 => 'first_alchemist_450',
    1414 => 'first_blacksmith_450',
    1416 => 'first_cooking_450',
    1417 => 'first_enchanter_450',
    1418 => 'first_engineer_450',
    1419 => 'first_firstaid_450',
    1420 => 'first_fishing_450',
    1421 => 'first_herbalist_450',
    1422 => 'first_inscriber_450',
    1427 => 'first_tailor_450',
    1424 => 'first_leatherworker_450',
    1425 => 'first_miner_450',
    1426 => 'first_skinner_450',
    3117 => 'first_raid_yoggsaron',
    3259 => 'first_raid_algalon',
    4078 => 'first_raid_grand_crusader',
    4576 => 'first_raid_lichking',
];

// TTL de 1 hora para el caché de Redis (3600 segundos).
$CACHE_TTL = 3600;
$cacheKey  = $REDIS_PREFIX . 'realmfirst:v3';

// ¿Es una petición de refresco del cron?
$isRefresh = isset($_GET['refresh']) && $_GET['refresh'] === '1';

// ---- Peticiones web normales: leer SIEMPRE de Redis ----
if (!$isRefresh) {
    if (class_exists('Redis', false)) {
        try {
            $redis = new Redis();
            if ($redis->connect($REDIS_SOCK, 0, 2) === true) {
                $redis->select((int) $REDIS_DB);
                $raw = $redis->get($cacheKey);
                if (is_string($raw) && $raw !== '') {
                    $cached = json_decode($raw, true);
                    if (is_array($cached)) {
                        respond(200, $cached);
                    }
                }
            }
        } catch (Exception $e) {
            // Si Redis falla, continuar con consulta directa.
        }
    }
    // Si no hay caché en Redis, hacer la consulta y cachear.
}

// ---- Consulta a la base de datos (petición de refresco o primer arranque) ----
mysqli_report(MYSQLI_REPORT_OFF);

$conn = @mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_CHAR, (int) $DB_PORT);
if (!$conn) {
    respond(503, ['ok' => false, 'message' => 'No se pudo conectar a la base de datos.']);
}

mysqli_set_charset($conn, 'utf8mb4');

$idList = implode(',', array_keys($REALM_FIRST_IDS));

$sql = "SELECT ca.`achievement`, ca.`date`, c.`name`, c.`race`, c.`class`, c.`gender`, c.`level` "
     . "FROM `character_achievement` ca "
     . "JOIN `characters` c ON c.`guid` = ca.`guid` "
     . "WHERE ca.`achievement` IN ({$idList}) "
     . "ORDER BY ca.`date` ASC";

$result = mysqli_query($conn, $sql);
if (!$result) {
    mysqli_close($conn);
    respond(500, ['ok' => false, 'message' => 'Error al consultar los logros.']);
}

// Map of completed achievements: achievement_id => row data.
$completed = [];
while ($row = mysqli_fetch_assoc($result)) {
    $achId = (int) $row['achievement'];
    // Keep only the first completion (earliest date, since ORDER BY date ASC).
    if (!isset($completed[$achId])) {
        $completed[$achId] = $row;
    }
}

mysqli_free_result($result);
mysqli_close($conn);

// Build entries for ALL tracked achievements, merging completed data when available.
// Order: follow the JSON map order (general, class, race, raids, profession, reputation).
$entries = [];
foreach ($achievementsMap as $achId => $meta) {
    $achId = (int) $achId;
    $row   = $completed[$achId] ?? null;

    $entry = [
        'achievement_id' => $achId,
        'label'          => $REALM_FIRST_IDS[$achId] ?? ('achievement_' . $achId),
        'name'           => $meta['name']      ?? ('Achievement ' . $achId),
        'category'       => $meta['category']  ?? 'general',
        'icon'           => $meta['icon']      ?? null,
        'icon_large'     => $meta['icon_large'] ?? null,
        'icon_medium'    => $meta['icon_medium'] ?? null,
        'icon_small'     => $meta['icon_small'] ?? null,
        'character_name' => $row ? $row['name'] : null,
        'race'           => $row ? (int) $row['race']   : null,
        'class'          => $row ? (int) $row['class']  : null,
        'gender'         => $row ? (int) $row['gender'] : null,
        'level'          => $row ? (int) $row['level']  : null,
        'date'           => $row ? date('Y-m-d H:i:s', (int) $row['date']) : null,
        'claimed'        => $row ? true : false,
    ];
    $entries[] = $entry;
}

$payload = [
    'ok'           => true,
    'count'        => count($entries),
    'entries'      => $entries,
    'updated_at'   => date('Y-m-d H:i:s'),
];

// Guardar en Redis con TTL de 1 hora.
if (class_exists('Redis', false)) {
    try {
        $redis = new Redis();
        if ($redis->connect($REDIS_SOCK, 0, 2) === true) {
            $redis->select((int) $REDIS_DB);
            $redis->setex($cacheKey, $CACHE_TTL, json_encode($payload, JSON_UNESCAPED_UNICODE));
        }
    } catch (Exception $e) {
        // Si Redis no está disponible, la respuesta se sirve igualmente sin cachear.
    }
}

respond(200, $payload);

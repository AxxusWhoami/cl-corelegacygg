<?php
// Endpoint que obtiene las estadísticas de Arena desde la base de datos de acore.
// - Peticiones web normales: leen SIEMPRE de Redis (respuesta instantánea).
// - Peticiones con ?refresh=1: consultan la base de datos, actualizan Redis y devuelven el resultado.
//   El cron horario debe llamar a /api/arenastats.php?refresh=1
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

// Mapeo de tipos de arena: type => etiqueta.
// AzerothCore usa 2 = 2v2, 3 = 3v3 y 5 = 5v5.
$ARENA_TYPES = [
    2 => '2v2',
    3 => '3v3',
    5 => '5v5',
];

// TTL de 1 hora para el caché de Redis (3600 segundos).
$CACHE_TTL = 3600;
$cacheKey  = $REDIS_PREFIX . 'arenastats:v1';

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

// Mapeo de razas y clases para el frontend.
$RACE_NAMES = [
    1 => 'Humano', 2 => 'Orco', 3 => 'Enano', 4 => 'Elfo de la Noche',
    5 => 'No-muerto', 6 => 'Tauren', 7 => 'Gnomo', 8 => 'Trol',
    9 => 'Elfo de Sangre', 10 => 'Draenei', 11 => 'Huargen', 22 => 'Worgen',
];
$CLASS_NAMES = [
    1 => 'Guerrero', 2 => 'Paladín', 3 => 'Cazador', 4 => 'Pícaro',
    5 => 'Sacerdote', 6 => 'Caballero de la Muerte', 7 => 'Chamán',
    8 => 'Mago', 9 => 'Brujo', 11 => 'Druida',
];
$CLASS_COLORS = [
    1 => '#C79C6E', 2 => '#F58CBA', 3 => '#ABD473', 4 => '#FFF569',
    5 => '#FFFFFF', 6 => '#C41F3B', 7 => '#0070DE', 8 => '#69CCF0',
    9 => '#9482C9', 11 => '#FF7D0A',
];

// Consultar equipos de arena ordenados por rating descendente.
// Se obtienen hasta 50 equipos por tipo de arena.
$brackets = [];
foreach ($ARENA_TYPES as $typeId => $typeLabel) {
    $sql = "SELECT at.`arenaTeamId`, at.`name`, at.`rating`, at.`seasonGames`, at.`seasonWins`, "
         . "at.`weekGames`, at.`weekWins`, at.`rank`, at.`captainGuid`, "
         . "c.`name` AS captainName, c.`race` AS captainRace, c.`class` AS captainClass "
         . "FROM `arena_team` at "
         . "LEFT JOIN `characters` c ON c.`guid` = at.`captainGuid` "
         . "WHERE at.`type` = {$typeId} AND at.`seasonGames` > 0 "
         . "ORDER BY at.`rating` DESC "
         . "LIMIT 50";

    $result = mysqli_query($conn, $sql);
    $teams = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            // Obtener miembros del equipo.
            $teamId = (int) $row['arenaTeamId'];
            $memberSql = "SELECT atm.`guid`, atm.`personalRating`, atm.`seasonGames`, atm.`seasonWins`, "
                       . "c.`name`, c.`race`, c.`class`, c.`gender`, c.`level` "
                       . "FROM `arena_team_member` atm "
                       . "JOIN `characters` c ON c.`guid` = atm.`guid` "
                       . "WHERE atm.`arenaTeamId` = {$teamId} "
                       . "ORDER BY atm.`personalRating` DESC";
            $memberResult = mysqli_query($conn, $memberSql);
            $members = [];
            if ($memberResult) {
                while ($memberRow = mysqli_fetch_assoc($memberResult)) {
                    $members[] = [
                        'name'           => $memberRow['name'],
                        'race'           => (int) $memberRow['race'],
                        'race_name'      => $RACE_NAMES[(int) $memberRow['race']] ?? 'Desconocida',
                        'class'          => (int) $memberRow['class'],
                        'class_name'     => $CLASS_NAMES[(int) $memberRow['class']] ?? 'Desconocida',
                        'class_color'    => $CLASS_COLORS[(int) $memberRow['class']] ?? '#cccccc',
                        'gender'         => (int) $memberRow['gender'],
                        'level'          => (int) $memberRow['level'],
                        'personal_rating'=> (int) $memberRow['personalRating'],
                        'season_games'   => (int) $memberRow['seasonGames'],
                        'season_wins'    => (int) $memberRow['seasonWins'],
                    ];
                }
                mysqli_free_result($memberResult);
            }

            $captainRace = $row['captainRace'] !== null ? (int) $row['captainRace'] : null;
            $captainClass = $row['captainClass'] !== null ? (int) $row['captainClass'] : null;

            $teams[] = [
                'team_id'      => $teamId,
                'name'         => $row['name'],
                'rating'       => (int) $row['rating'],
                'season_games' => (int) $row['seasonGames'],
                'season_wins'  => (int) $row['seasonWins'],
                'week_games'   => (int) $row['weekGames'],
                'week_wins'    => (int) $row['weekWins'],
                'rank'         => (int) $row['rank'],
                'captain_name' => $row['captainName'] ?? null,
                'captain_race' => $captainRace,
                'captain_race_name' => $captainRace !== null ? ($RACE_NAMES[$captainRace] ?? 'Desconocida') : null,
                'captain_class'=> $captainClass,
                'captain_class_name' => $captainClass !== null ? ($CLASS_NAMES[$captainClass] ?? 'Desconocida') : null,
                'captain_class_color' => $captainClass !== null ? ($CLASS_COLORS[$captainClass] ?? '#cccccc') : '#cccccc',
                'members'      => $members,
            ];
        }
        mysqli_free_result($result);
    }
    $brackets[$typeLabel] = $teams;
}

mysqli_close($conn);

$payload = [
    'ok'         => true,
    'brackets'   => $brackets,
    'updated_at' => date('Y-m-d H:i:s'),
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

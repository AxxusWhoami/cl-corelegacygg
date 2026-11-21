<?php
// Cron que genera el JSON completo de rankings de Challenge Modes y lo guarda en Redis.
// - Se ejecuta via CLI o desde una IP local (programador de tareas del servidor).
// - Consulta la base de datos de personajes (mockup: acore_characters_rpp, real: acore_characters).
// - Guarda el resultado en Redis (socket Armory) con TTL de 2 dias (172800 segundos).
// - La API publica /api/challenges.php solo lee de Redis, nunca toca la BD.
// PHP 7.4 · mysqli · Redis (caché vía Unix socket)

declare(strict_types=1);

// Bloquear acceso web externo: solo CLI o IP local.
if (php_sapi_name() !== 'cli') {
    $remoteIp = $_SERVER['REMOTE_ADDR'] ?? '';
    $cfIp = $_SERVER['HTTP_CF_CONNECTING_IP'] ?? '';
    if ($cfIp !== '' && filter_var($cfIp, FILTER_VALIDATE_IP) !== false) {
        $remoteIp = $cfIp;
    }
    $allowedIps = ['127.0.0.1', '::1', '10.0.0.1'];
    if (!in_array($remoteIp, $allowedIps, true)) {
        http_response_code(403);
        echo 'Forbidden';
        exit;
    }
}

require __DIR__ . '/../params.php';

// TTL de 2 dias para el caché de Redis.
$CACHE_TTL = 172800;
$cacheKey  = $ARMORY_REDIS_PREFIX . 'challenges:v1';

// Mapeos de raza y clase para el frontend.
$RACE_NAMES = [
    1 => 'Humano', 2 => 'Orco', 3 => 'Enano', 4 => 'Elfo de la Noche',
    5 => 'No-muerto', 6 => 'Tauren', 7 => 'Gnomo', 8 => 'Trol',
    9 => 'Goblin', 10 => 'Elfo de Sangre', 11 => 'Draenei', 22 => 'Worgen',
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
$RACE_ICONS = [
    1 => '/assets/icons/medium/achievement_character_human_male.jpg',
    2 => '/assets/icons/medium/achievement_character_orc_male.jpg',
    3 => '/assets/icons/medium/achievement_character_dwarf_male.jpg',
    4 => '/assets/icons/medium/achievement_character_nightelf_male.jpg',
    5 => '/assets/icons/medium/achievement_character_undead_male.jpg',
    6 => '/assets/icons/medium/achievement_character_tauren_male.jpg',
    7 => '/assets/icons/medium/achievement_character_gnome_male.jpg',
    8 => '/assets/icons/medium/achievement_character_troll_male.jpg',
    9 => '/assets/icons/medium/achievement_character_undead_male.jpg',
    10 => '/assets/icons/medium/achievement_character_bloodelf_male.jpg',
    11 => '/assets/icons/medium/achievement_character_human_male.jpg',
    22 => '/assets/icons/medium/achievement_character_human_male.jpg',
];
$MODE_ICONS = [
    0 => '/assets/desafios/desafio_hardcore_512.png',
    1 => '/assets/desafios/desafio_semihardcore_512.png',
    2 => '/assets/desafios/desafio_self_crafted_512.png',
    3 => '/assets/desafios/desafio_item_quality_512.png',
    4 => '/assets/desafios/desafio_slow_xp_gain_512.png',
    5 => '/assets/desafios/desafio_very_slow_xp_gain_512.png',
    6 => '/assets/desafios/desafio_quest_xp_only_512.png',
    7 => '/assets/desafios/desafio_ironman_512.png',
    9 => '/assets/desafios/desafio_one_life_512.png',
];

// Mapeo de columnas de raza/clase para queries que incluyen characters.
function mapRaceClass(?int $race, ?int $class): array
{
    global $RACE_NAMES, $CLASS_NAMES, $CLASS_COLORS;
    return [
        'race'        => $race,
        'race_name'   => $race !== null ? ($RACE_NAMES[$race] ?? 'Desconocida') : null,
        'class'       => $class,
        'class_name'  => $class !== null ? ($CLASS_NAMES[$class] ?? 'Desconocida') : null,
        'class_color' => $class !== null ? ($CLASS_COLORS[$class] ?? '#cccccc') : '#cccccc',
    ];
}

// ---- Conexión a la base de datos ----
mysqli_report(MYSQLI_REPORT_OFF);

$conn = @mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $RPP_CHAR, (int) $DB_PORT);
if (!$conn) {
    // Si no podemos conectar, salir silenciosamente (es un cron).
    fwrite(STDERR, date('Y-m-d H:i:s') . " challenges cron: no se pudo conectar a la BD.\n");
    exit(1);
}

mysqli_set_charset($conn, 'utf8mb4');

$payload = [
    'ok'         => true,
    'updated_at' => date('Y-m-d H:i:s'),
    'meta'       => [
        'race_names'  => $RACE_NAMES,
        'race_icons'  => $RACE_ICONS,
        'class_names' => $CLASS_NAMES,
        'class_colors'=> $CLASS_COLORS,
        'mode_icons'  => $MODE_ICONS,
    ],
];

// ---- 1. Pesos de los modos ----
$weights = [];
$sql = "SELECT `challenge_mode`, `mode_name`, `weight`, `is_permadeath`, `description` "
     . "FROM `challenge_mode_weights` ORDER BY `challenge_mode` ASC";
$result = mysqli_query($conn, $sql);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $weights[] = [
            'challenge_mode' => (int) $row['challenge_mode'],
            'mode_name'      => $row['mode_name'],
            'weight'         => (float) $row['weight'],
            'is_permadeath'  => (int) $row['is_permadeath'],
            'description'    => $row['description'],
            'icon'           => $MODE_ICONS[(int) $row['challenge_mode']] ?? null,
        ];
    }
    mysqli_free_result($result);
}
$payload['weights'] = $weights;

// ---- 2. Top 20 Global de la temporada activa ----
$global = [];
$sql = "SELECT `character_name`, `total_score`, `challenges_active`, `highest_level`, `is_alive`, `last_updated` "
     . "FROM `challenge_mode_rankings` "
     . "WHERE `season_id` = (SELECT `id` FROM `challenge_mode_seasons` WHERE `is_active` = 1 ORDER BY `start_time` DESC LIMIT 1) "
     . "ORDER BY `total_score` DESC "
     . "LIMIT 20";
$result = mysqli_query($conn, $sql);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $global[] = [
            'name'              => $row['character_name'],
            'score'             => (int) round((float) $row['total_score']),
            'challenges_active' => (int) $row['challenges_active'],
            'highest_level'     => (int) $row['highest_level'],
            'is_alive'          => (int) $row['is_alive'],
            'last_updated'      => $row['last_updated'] ? date('Y-m-d H:i:s', (int) $row['last_updated']) : null,
        ];
    }
    mysqli_free_result($result);
}
$payload['global'] = $global;

// ---- 3. Temporada activa (solo una activa a la vez, sin solapar fechas) ----
$season = ['season_name' => null, 'season_id' => 0, 'start_date' => null, 'end_date' => null, 'entries' => []];
$sql = "SELECT `id`, `name`, `start_time`, `end_time` "
     . "FROM `challenge_mode_seasons` "
     . "WHERE `is_active` = 1 "
     . "ORDER BY `start_time` DESC LIMIT 1";
$result = mysqli_query($conn, $sql);
$activeSeasonId = 0;
$activeSeasonName = null;
$activeSeasonStart = null;
$activeSeasonEnd = null;
if ($result) {
    $row = mysqli_fetch_assoc($result);
    if ($row) {
        $activeSeasonId = (int) $row['id'];
        $activeSeasonName = $row['name'];
        $activeSeasonStart = $row['start_time'] ? date('Y-m-d', (int) $row['start_time']) : null;
        $activeSeasonEnd = $row['end_time'] ? date('Y-m-d', (int) $row['end_time']) : null;
    }
    mysqli_free_result($result);
}
$season['season_name'] = $activeSeasonName;
$season['season_id'] = $activeSeasonId;
$season['start_date'] = $activeSeasonStart;
$season['end_date'] = $activeSeasonEnd;
if ($activeSeasonId > 0) {
    $sql = "SELECT `character_name`, `total_score`, `challenges_active`, `highest_level`, `is_alive`, `last_updated`, "
         . "`streak_days`, `streak_started_at`, `last_death_time` "
         . "FROM `challenge_mode_rankings` "
         . "WHERE `season_id` = {$activeSeasonId} "
         . "ORDER BY `total_score` DESC "
         . "LIMIT 25";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $season['entries'][] = [
                'name'              => $row['character_name'],
                'score'             => (int) round((float) $row['total_score']),
                'challenges_active' => (int) $row['challenges_active'],
                'highest_level'     => (int) $row['highest_level'],
                'is_alive'          => (int) $row['is_alive'],
                'last_updated'      => $row['last_updated'] ? date('Y-m-d H:i:s', (int) $row['last_updated']) : null,
                'streak_days'       => (int) ($row['streak_days'] ?? 0),
                'streak_started_at' => $row['streak_started_at'] ? date('Y-m-d H:i:s', (int) $row['streak_started_at']) : null,
                'last_death_time'   => $row['last_death_time'] ? date('Y-m-d H:i:s', (int) $row['last_death_time']) : null,
            ];
        }
        mysqli_free_result($result);
    }
}
$payload['season'] = $season;

// ---- 3b. Lista de todas las temporadas ----
$seasonsList = [];
$sql = "SELECT `id`, `name`, `start_time`, `end_time`, `is_active` "
     . "FROM `challenge_mode_seasons` ORDER BY `start_time` ASC";
$result = mysqli_query($conn, $sql);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $seasonsList[] = [
            'id'         => (int) $row['id'],
            'name'       => $row['name'],
            'start_date' => $row['start_time'] ? date('Y-m-d', (int) $row['start_time']) : null,
            'end_date'   => $row['end_time'] ? date('Y-m-d', (int) $row['end_time']) : null,
            'is_active'  => (int) $row['is_active'],
        ];
    }
    mysqli_free_result($result);
}
$payload['seasons'] = $seasonsList;

// ---- 4. Hitos (challenge_mode_milestones) — ultimos 2000 ----
$milestones = [];
$sql = "SELECT m.`id`, m.`season_id`, m.`character_name`, m.`challenge_mode`, "
     . "m.`milestone_type`, m.`milestone_level`, m.`details`, m.`achieved_at`, "
     . "s.`name` AS season_name, w.`mode_name` "
     . "FROM `challenge_mode_milestones` m "
     . "LEFT JOIN `challenge_mode_seasons` s ON m.`season_id` = s.`id` "
     . "LEFT JOIN `challenge_mode_weights` w ON m.`challenge_mode` = w.`challenge_mode` "
     . "ORDER BY m.`achieved_at` DESC LIMIT 2000";
$result = mysqli_query($conn, $sql);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $milestones[] = [
            'id'              => (int) $row['id'],
            'season_id'       => (int) $row['season_id'],
            'season_name'     => $row['season_name'],
            'name'            => $row['character_name'],
            'challenge_mode'  => (int) $row['challenge_mode'],
            'mode_name'       => $row['mode_name'],
            'milestone_type'  => $row['milestone_type'],
            'milestone_level' => (int) $row['milestone_level'],
            'details'         => $row['details'],
            'achieved_at'     => $row['achieved_at'] ? date('Y-m-d H:i:s', (int) $row['achieved_at']) : null,
        ];
    }
    mysqli_free_result($result);
}
$payload['milestones'] = $milestones;

// ---- 4b. Estadisticas diarias (challenge_mode_daily_stats) — todas las temporadas ----
$dailyStats = [];
$sql = "SELECT `snapshot_date`, `season_id`, `challenge_mode`, `total_characters`, "
     . "`active_characters`, `dead_characters`, `average_level`, `max_level`, "
     . "`average_score`, `max_score`, `captured_at` "
     . "FROM `challenge_mode_daily_stats` ORDER BY `snapshot_date` ASC";
$result = mysqli_query($conn, $sql);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $dailyStats[] = [
            'snapshot_date'    => $row['snapshot_date'],
            'season_id'        => (int) $row['season_id'],
            'challenge_mode'   => (int) $row['challenge_mode'],
            'total_characters' => (int) $row['total_characters'],
            'active_characters'=> (int) $row['active_characters'],
            'dead_characters'  => (int) $row['dead_characters'],
            'average_level'    => (float) $row['average_level'],
            'max_level'        => (int) $row['max_level'],
            'average_score'    => (float) $row['average_score'],
            'max_score'        => (int) round((float) $row['max_score']),
        ];
    }
    mysqli_free_result($result);
}
$payload['daily_stats'] = $dailyStats;

// ---- 5. Top 20 Combinado (vista challenge_mode_scores) ----
$combined = [];
$sql = "SELECT `character_name`, `total_score`, `challenges_active`, `highest_level`, `is_alive` "
     . "FROM `challenge_mode_scores` "
     . "ORDER BY `total_score` DESC "
     . "LIMIT 20";
$result = mysqli_query($conn, $sql);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $combined[] = [
            'name'              => $row['character_name'],
            'score'             => (int) round((float) $row['total_score']),
            'challenges_active' => (int) $row['challenges_active'],
            'highest_level'     => (int) $row['highest_level'],
            'is_alive'          => (int) $row['is_alive'],
        ];
    }
    mysqli_free_result($result);
}
$payload['combined'] = $combined;

// ---- 6. Top 20 por cada modo (9 consultas separadas) ----
$modes = [];
foreach ($weights as $w) {
    $modeId = $w['challenge_mode'];
    $modeEntries = [];
    $sql = "SELECT `character_name`, `total_score`, `challenges_active`, `highest_level`, `is_alive` "
         . "FROM `challenge_mode_scores` "
         . "WHERE `guid` IN (SELECT `guid` FROM `challenge_mode_progress` WHERE `challenge_mode` = {$modeId} AND `status` = 1) "
         . "ORDER BY `total_score` DESC "
         . "LIMIT 20";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $modeEntries[] = [
                'name'              => $row['character_name'],
                'score'             => (int) round((float) $row['total_score']),
                'challenges_active' => (int) $row['challenges_active'],
                'highest_level'     => (int) $row['highest_level'],
                'is_alive'          => (int) $row['is_alive'],
            ];
        }
        mysqli_free_result($result);
    }
    $modes[$modeId] = $modeEntries;
}
$payload['modes'] = $modes;

// ---- 7. Muertes notables (solo permadeath) ----
$deaths = [];
$sql = "SELECT d.`name` AS character_name, d.`level`, d.`cause`, w.`mode_name`, d.`death_time` "
     . "FROM `challenge_mode_deaths` d "
     . "JOIN `challenge_mode_weights` w ON d.`challenge_mode` = w.`challenge_mode` "
     . "WHERE w.`is_permadeath` = 1 "
     . "ORDER BY d.`level` DESC, d.`death_time` ASC "
     . "LIMIT 10";
$result = mysqli_query($conn, $sql);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $deaths[] = [
            'name'       => $row['character_name'],
            'level'      => (int) $row['level'],
            'cause'      => $row['cause'],
            'mode_name'  => $row['mode_name'],
            'death_date' => $row['death_time'] ? date('Y-m-d H:i:s', (int) $row['death_time']) : null,
        ];
    }
    mysqli_free_result($result);
}
$payload['deaths'] = $deaths;

// ---- 8. Sala de la Fama (season winners) ----
$hall = [];
$sql = "SELECT s.`name` AS season_name, w.`rank_position`, w.`character_name`, w.`total_score`, "
     . "w.`challenges_active`, w.`highest_level`, w.`is_alive`, w.`recorded_at` "
     . "FROM `challenge_mode_season_winners` w "
     . "JOIN `challenge_mode_seasons` s ON w.`season_id` = s.`id` "
     . "ORDER BY w.`season_id`, w.`rank_position` ASC";
$result = mysqli_query($conn, $sql);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $hall[] = [
            'season_name'       => $row['season_name'],
            'rank_position'     => (int) $row['rank_position'],
            'name'              => $row['character_name'],
            'score'             => (int) round((float) $row['total_score']),
            'challenges_active' => (int) $row['challenges_active'],
            'highest_level'     => (int) $row['highest_level'],
            'is_alive'          => (int) $row['is_alive'],
            'recorded_at'       => $row['recorded_at'] ? date('Y-m-d H:i:s', (int) $row['recorded_at']) : null,
        ];
    }
    mysqli_free_result($result);
}
$payload['hall'] = $hall;

// Añadir raza, clase y retrato a todas las clasificaciones e hitos antes de generar el JSON.
$seasonEntries = &$season['entries'];
$rankingLists = [&$global, &$seasonEntries, &$combined, &$deaths, &$hall, &$milestones];
foreach ($modes as &$modeEntries) {
    $rankingLists[] = &$modeEntries;
}
unset($modeEntries);

$characterNames = [];
foreach ($rankingLists as $entries) {
    foreach ($entries as $entry) {
        if (!empty($entry['name'])) {
            $characterNames[$entry['name']] = true;
        }
    }
}
$charInfo = [];
if ($characterNames) {
    $nameList = [];
    foreach (array_keys($characterNames) as $characterName) {
        $nameList[] = "'" . mysqli_real_escape_string($conn, $characterName) . "'";
    }
    $raceResult = mysqli_query($conn, "SELECT `name`, `race`, `class` FROM `characters` WHERE `name` IN (" . implode(',', $nameList) . ")");
    if ($raceResult) {
        while ($raceRow = mysqli_fetch_assoc($raceResult)) {
            $raceId = (int) $raceRow['race'];
            $classId = $raceRow['class'] !== null ? (int) $raceRow['class'] : null;
            $charInfo[$raceRow['name']] = [
                'race'        => $raceId,
                'race_name'   => $RACE_NAMES[$raceId] ?? 'Desconocida',
                'race_icon'   => $RACE_ICONS[$raceId] ?? null,
                'class'       => $classId,
                'class_name'  => $classId !== null ? ($CLASS_NAMES[$classId] ?? 'Desconocida') : null,
                'class_color' => $classId !== null ? ($CLASS_COLORS[$classId] ?? '#cccccc') : '#cccccc',
            ];
        }
        mysqli_free_result($raceResult);
    }
}
$defaultInfo = ['race' => null, 'race_name' => null, 'race_icon' => null, 'class' => null, 'class_name' => null, 'class_color' => '#cccccc'];
foreach ($rankingLists as &$entries) {
    foreach ($entries as &$entry) {
        $info = $charInfo[$entry['name']] ?? $defaultInfo;
        $entry = array_merge($entry, $info);
    }
    unset($entry);
}
unset($entries);

$payload['global'] = $global;
$payload['season']['entries'] = $seasonEntries;
$payload['combined'] = $combined;
$payload['deaths'] = $deaths;
$payload['hall'] = $hall;
$payload['milestones'] = $milestones;
foreach ($modes as $modeId => $modeEntries) {
    $payload['modes'][$modeId] = $modeEntries;
}

mysqli_close($conn);

// ---- Guardar en Redis con TTL de 2 dias ----
if ($ARMORY_REDIS_ENABLE && class_exists('Redis', false)) {
    try {
        $redis = new Redis();
        if ($redis->connect($ARMORY_REDIS_SOCKET, 0, 5) === true) {
            $redis->select((int) $ARMORY_REDIS_DB);
            $redis->setex($cacheKey, $CACHE_TTL, json_encode($payload, JSON_UNESCAPED_UNICODE));
        }
    } catch (Exception $e) {
        fwrite(STDERR, date('Y-m-d H:i:s') . " challenges cron: Redis error: " . $e->getMessage() . "\n");
    }
}

fwrite(STDOUT, date('Y-m-d H:i:s') . " challenges cron: datos actualizados en Redis (key={$cacheKey}, ttl={$CACHE_TTL}s).\n");
exit(0);

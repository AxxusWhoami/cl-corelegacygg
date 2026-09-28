<?php

declare(strict_types=1);

ini_set('display_errors', '0');
error_reporting(0);

header('Content-Type: application/json; charset=utf-8');
header('X-Content-Type-Options: nosniff');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Client-Info, Apikey');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'message' => 'Método no permitido.'], JSON_UNESCAPED_UNICODE);
    exit;
}

require __DIR__ . '/../params.php';
require __DIR__ . '/ratelimit.php';
require __DIR__ . '/armory-redis.php';
check_rate_limit($DDOS_REDIS_ENABLE, $DDOS_REDIS_SOCKET, $DDOS_REDIS_PASS, $DDOS_REDIS_DB, $DDOS_REDIS_PREFIX, 60, 30);

$validLocales = ['enUS', 'esES', 'frFR', 'deDE'];
$locale = isset($_GET['locale']) ? trim($_GET['locale']) : 'enUS';
if (!in_array($locale, $validLocales, true)) {
    $locale = 'enUS';
}

$cacheKey = $ARMORY_REDIS_PREFIX . 'changelog:' . $locale;
$cacheTtl = 14 * 3600; // 14 horas

$cached = armory_redis_read($cacheKey);
if (is_array($cached)) {
    http_response_code(200);
    echo json_encode(['ok' => true, 'data' => $cached], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    exit;
}

if (!class_exists('mysqli', false)) {
    http_response_code(200);
    echo json_encode(['ok' => true, 'data' => [], 'message' => 'Base de datos no disponible en este entorno.'], JSON_UNESCAPED_UNICODE);
    exit;
}

$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_WEB, $DB_PORT);
if ($mysqli->connect_errno) {
    http_response_code(200);
    echo json_encode(['ok' => true, 'data' => [], 'message' => 'No se pudo conectar a la base de datos.'], JSON_UNESCAPED_UNICODE);
    exit;
}
$mysqli->set_charset($DB_CHARSET);

$stmt = $mysqli->prepare(
    "SELECT
         c.`id`,
         c.`commit_hash`,
         COALESCE(l.`commit`, c.`commit`) AS `commit`,
         c.`dateadd`
     FROM `" . $TABLE_CHANGELOG_COMMITS . "` c
     LEFT JOIN `" . $TABLE_CHANGELOG_LANG . "` l
         ON l.`changelog_id` = c.`id` AND l.`locale` = ?
     ORDER BY c.`dateadd` DESC"
);
if (!$stmt) {
    $mysqli->close();
    http_response_code(500);
    echo json_encode(['ok' => false, 'message' => 'Error al preparar la consulta.'], JSON_UNESCAPED_UNICODE);
    exit;
}

$stmt->bind_param('s', $locale);
if (!$stmt->execute()) {
    $stmt->close();
    $mysqli->close();
    http_response_code(500);
    echo json_encode(['ok' => false, 'message' => 'Error al ejecutar la consulta.'], JSON_UNESCAPED_UNICODE);
    exit;
}

$result  = $stmt->get_result();
$entries = [];
while ($row = $result->fetch_assoc()) {
    $entries[] = [
        'id'          => (int) $row['id'],
        'commit_hash' => $row['commit_hash'],
        'commit'      => $row['commit'],
        'dateadd'     => $row['dateadd'],
    ];
}
$stmt->close();
$mysqli->close();

$entries = array_values(array_filter($entries, static function ($entry): bool {
    return is_array($entry) && !preg_match('/NO PÚBLICO|NOT PUBLIC/i', (string) ($entry['commit'] ?? ''));
}));

armory_redis_write($cacheKey, json_encode($entries, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES), $cacheTtl);

http_response_code(200);
echo json_encode(['ok' => true, 'data' => $entries], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

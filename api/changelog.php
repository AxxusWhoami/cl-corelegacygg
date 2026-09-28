<?php

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
    echo json_encode(['ok' => false, 'message' => 'Método no permitido.'], JSON_UNESCAPED_UNICODE);
    exit;
}

require __DIR__ . '/../params.php';
require __DIR__ . '/ratelimit.php';
require __DIR__ . '/armory-redis.php';
check_rate_limit($DDOS_REDIS_SOCKET, $DDOS_REDIS_PASS, $DDOS_REDIS_DB, $DDOS_REDIS_PREFIX, 60, 30);

$value = armory_redis_read_first([
    $ARMORY_REDIS_PREFIX . 'changelog:esES',
    $ARMORY_REDIS_PREFIX . 'changelog:es-ES',
    $ARMORY_REDIS_PREFIX . 'changelog',
]);

$entries = $value;
if (is_array($value) && isset($value['data']) && is_array($value['data'])) {
    $entries = $value['data'];
}
if (!is_array($entries)) {
    $entries = [];
}

$entries = array_values(array_filter($entries, static function ($entry): bool {
    return is_array($entry) && !preg_match('/NO PÚBLICO|NOT PUBLIC/i', (string) ($entry['commit'] ?? ''));
}));

http_response_code(200);
echo json_encode(['ok' => true, 'data' => $entries], JSON_UNESCAPED_UNICODE);

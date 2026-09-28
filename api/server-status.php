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
    $ARMORY_REDIS_PREFIX . 'server:status',
    $ARMORY_REDIS_PREFIX . 'server_status',
    $ARMORY_REDIS_PREFIX . 'realm:status',
    $ARMORY_REDIS_PREFIX . 'realm_status',
    $ARMORY_REDIS_PREFIX . 'status',
]);

if (!is_array($value)) {
    http_response_code(503);
    echo json_encode([
        'ok' => false,
        'message' => 'El estado del servidor no está disponible temporalmente.',
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

$readFlag = static function (array $data, array $keys): int {
    foreach ($keys as $key) {
        if (array_key_exists($key, $data)) {
            $value = $data[$key];
            if (is_bool($value)) return $value ? 1 : 0;
            if (is_numeric($value)) return (int) $value === 1 ? 1 : 0;
            if (is_string($value)) return in_array(strtolower($value), ['1', 'true', 'online', 'up'], true) ? 1 : 0;
        }
    }
    return 0;
};

$login = $readFlag($value, ['logon_status', 'login_status', 'logon', 'login']);
$realm = $readFlag($value, ['server_status', 'realm_status', 'realm', 'world']);

http_response_code(200);
echo json_encode([
    'ok' => true,
    'data' => [
        'logon_status' => $login,
        'server_status' => $realm,
        'updated_at' => $value['updated_at'] ?? date('Y-m-d H:i:s'),
    ],
], JSON_UNESCAPED_UNICODE);

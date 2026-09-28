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
check_rate_limit($DDOS_REDIS_ENABLE, $DDOS_REDIS_SOCKET, $DDOS_REDIS_PASS, $DDOS_REDIS_DB, $DDOS_REDIS_PREFIX, 60, 30);

function check_tcp_port(string $host, int $port, float $timeout = 1.5): int
{
    $errno  = 0;
    $errstr = '';
    $sock = @fsockopen($host, $port, $errno, $errstr, $timeout);
    if ($sock === false) {
        return 0;
    }
    fclose($sock);
    return 1;
}

$cacheKey    = $ARMORY_REDIS_PREFIX . 'server_status:v2';
$cacheTtl    = 30;
$cached      = armory_redis_read($cacheKey);
$forceRefresh = isset($_GET['refresh']) && $_GET['refresh'] === '1';

if (!$forceRefresh && is_array($cached) && isset($cached['logon_status'], $cached['server_status'])) {
    http_response_code(200);
    echo json_encode([
        'ok'   => true,
        'data' => [
            'logon_status'  => (int) $cached['logon_status'],
            'server_status' => (int) $cached['server_status'],
            'updated_at'    => $cached['updated_at'] ?? date('Y-m-d H:i:s'),
        ],
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

$logonStatus  = check_tcp_port($GAME_SERVER_HOST, $GAME_LOGON_PORT);
$serverStatus = check_tcp_port($GAME_SERVER_HOST, $GAME_WORLD_PORT);

$payload = [
    'logon_status'  => $logonStatus,
    'server_status' => $serverStatus,
    'updated_at'    => date('Y-m-d H:i:s'),
];

armory_redis_write($cacheKey, json_encode($payload, JSON_UNESCAPED_UNICODE), $cacheTtl);

http_response_code(200);
echo json_encode([
    'ok'   => true,
    'data' => $payload,
], JSON_UNESCAPED_UNICODE);

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

$prefix    = $ARMORY_REDIS_PREFIX;
$serverStatus = armory_redis_read_int($prefix . 'status');
$logonStatus  = armory_redis_read_int($prefix . 'logon_status');
$playersOnline = armory_redis_read_int($prefix . 'players_online');
$starttime    = armory_redis_read_int($prefix . 'starttime');
$uptime      = armory_redis_read_int($prefix . 'uptime');
$maxPlayers  = armory_redis_read_int($prefix . 'maxplayers');

if ($serverStatus === null && $logonStatus === null) {
    http_response_code(200);
    echo json_encode([
        'ok' => true,
        'data' => [
            'logon_status'   => 0,
            'server_status'  => 0,
            'players_online' => 0,
            'starttime'      => 0,
            'uptime'         => 0,
            'max_players'    => 0,
            'updated_at'     => date('Y-m-d H:i:s'),
        ],
        'message' => 'Estado del servidor no disponible temporalmente.',
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

http_response_code(200);
echo json_encode([
    'ok' => true,
    'data' => [
        'logon_status'   => $logonStatus ?? 0,
        'server_status'  => $serverStatus ?? 0,
        'players_online' => $playersOnline ?? 0,
        'starttime'      => $starttime ?? 0,
        'uptime'         => $uptime ?? 0,
        'max_players'    => $maxPlayers ?? 0,
        'updated_at'     => date('Y-m-d H:i:s'),
    ],
], JSON_UNESCAPED_UNICODE);

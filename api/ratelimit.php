<?php
// Rate limiter anti-DDoS basado en Redis (socket Unix dedicado).
// Cuenta peticiones por IP en una ventana de tiempo deslizante.
// Si la IP supera el límite, devuelve 429 y finaliza la ejecución.
//
// Uso:
//   require __DIR__ . '/ratelimit.php';
//   check_rate_limit($DDOS_REDIS_ENABLE, $DDOS_REDIS_SOCKET, $DDOS_REDIS_PASS, $DDOS_REDIS_DB,
//                     $DDOS_REDIS_PREFIX, 60, 30); // 30 peticiones por 60 segundos
//
// Si Redis no está disponible, la petición continúa sin bloqueo (fail-open).

declare(strict_types=1);

function check_rate_limit(
    int $enabled,
    string $socket,
    string $pass,
    int $db,
    string $prefix,
    int $windowSeconds,
    int $maxRequests
): void {
    if ($enabled !== 1) {
        return;
    }

    $ip = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';

    // Detrás de Cloudflare: usar CF-Connecting-IP si está presente.
    $cfIp = $_SERVER['HTTP_CF_CONNECTING_IP'] ?? '';
    if ($cfIp !== '' && filter_var($cfIp, FILTER_VALIDATE_IP) !== false) {
        $ip = $cfIp;
    }

    $script = <<<'LUA'
local key = KEYS[1]
local limit = tonumber(ARGV[1])
local window = tonumber(ARGV[2])
local current = redis.call('INCR', key)
if current == 1 then
    redis.call('EXPIRE', key, window)
end
if current > limit then
    return 0
end
return 1
LUA;

    if (!class_exists('Redis', false)) {
        return;
    }

    try {
        $redis = new Redis();
        if ($redis->connect($socket, 0, 1) !== true) {
            return;
        }
        if ($pass !== '') {
            $redis->auth($pass);
        }
        $redis->select($db);

        $key = $prefix . 'ratelimit:' . $ip;
        $allowed = $redis->eval($script, [$key, $maxRequests, $windowSeconds], 1);

        if ($allowed === 0) {
            $retryAfter = $windowSeconds;
            header('Retry-After: ' . $retryAfter);
            http_response_code(429);
            echo json_encode([
                'ok'      => false,
                'message' => 'Demasiadas peticiones. Inténtalo de nuevo en unos segundos.',
            ], JSON_UNESCAPED_UNICODE);
            exit;
        }
    } catch (Exception $e) {
        // fail-open: si Redis falla, permitir la petición.
    }
}

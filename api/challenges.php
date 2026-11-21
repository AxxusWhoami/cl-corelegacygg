<?php
// API publica que devuelve los rankings de Challenge Modes desde Redis.
// NUNCA se conecta a la base de datos — el cron (/cron/challenges.php) es el unico escritor.
// - Peticiones web normales: leen SIEMPRE de Redis (respuesta instantanea, anti-DDOS).
// - Sin modo ?refresh=1: la API nunca toca la BD.
// PHP 7.4 · Redis (caché vía Unix socket)

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
require __DIR__ . '/ratelimit.php';
check_rate_limit($DDOS_REDIS_ENABLE, $DDOS_REDIS_SOCKET, $DDOS_REDIS_PASS, $DDOS_REDIS_DB, $DDOS_REDIS_PREFIX, 60, 30);

function respond(int $status, array $payload): void
{
    http_response_code($status);
    echo json_encode($payload, JSON_UNESCAPED_UNICODE);
    exit;
}

$cacheKey = $ARMORY_REDIS_PREFIX . 'challenges:v1';

// Vistas validas que se pueden solicitar.
$VALID_VIEWS = ['global', 'season', 'combined', 'deaths', 'hall', 'weights', 'mode'];
$view = $_GET['view'] ?? 'global';
if (!in_array($view, $VALID_VIEWS, true)) {
    respond(400, ['ok' => false, 'message' => 'Vista no válida. Vistas disponibles: ' . implode(', ', $VALID_VIEWS)]);
}

$modeParam = isset($_GET['mode']) ? (int) $_GET['mode'] : 0;

// ---- Leer SIEMPRE de Redis ----
if (!$ARMORY_REDIS_ENABLE || !class_exists('Redis', false)) {
    respond(503, ['ok' => false, 'message' => 'Redis no está disponible.']);
}

try {
    $redis = new Redis();
    if ($redis->connect($ARMORY_REDIS_SOCKET, 0, 2) !== true) {
        respond(503, ['ok' => false, 'message' => 'No se pudo conectar a Redis.']);
    }
    $redis->select((int) $ARMORY_REDIS_DB);
    $raw = $redis->get($cacheKey);
    if (!is_string($raw) || $raw === '') {
        respond(503, ['ok' => false, 'message' => 'Datos de rankings no disponibles todavía. Se actualizan cada 2 días.']);
    }
    $cached = json_decode($raw, true);
    if (!is_array($cached)) {
        respond(503, ['ok' => false, 'message' => 'Error al decodificar los datos de Redis.']);
    }
} catch (Exception $e) {
    respond(503, ['ok' => false, 'message' => 'Error de Redis.']);
}

// ---- Devolver solo la seccion solicitada ----
$updated_at = $cached['updated_at'] ?? null;

switch ($view) {
    case 'global':
        respond(200, [
            'ok'         => true,
            'view'       => 'global',
            'entries'    => $cached['global'] ?? [],
            'updated_at' => $updated_at,
        ]);
        break;

    case 'season':
        respond(200, [
            'ok'          => true,
            'view'        => 'season',
            'season_name' => $cached['season']['season_name'] ?? null,
            'season_id'   => $cached['season']['season_id'] ?? 0,
            'start_date'  => $cached['season']['start_date'] ?? null,
            'end_date'    => $cached['season']['end_date'] ?? null,
            'entries'     => $cached['season']['entries'] ?? [],
            'updated_at'  => $updated_at,
        ]);
        break;

    case 'combined':
        respond(200, [
            'ok'         => true,
            'view'       => 'combined',
            'entries'    => $cached['combined'] ?? [],
            'updated_at' => $updated_at,
        ]);
        break;

    case 'deaths':
        respond(200, [
            'ok'         => true,
            'view'       => 'deaths',
            'entries'    => $cached['deaths'] ?? [],
            'updated_at' => $updated_at,
        ]);
        break;

    case 'hall':
        respond(200, [
            'ok'         => true,
            'view'       => 'hall',
            'entries'    => $cached['hall'] ?? [],
            'updated_at' => $updated_at,
        ]);
        break;

    case 'weights':
        respond(200, [
            'ok'         => true,
            'view'       => 'weights',
            'entries'    => $cached['weights'] ?? [],
            'meta'       => $cached['meta'] ?? [],
            'updated_at' => $updated_at,
        ]);
        break;

    case 'mode':
        $modes = $cached['modes'] ?? [];
        if (!isset($modes[$modeParam])) {
            respond(404, ['ok' => false, 'message' => "No hay datos para el modo {$modeParam}."]);
        }
        $modeInfo = null;
        foreach ($cached['weights'] ?? [] as $w) {
            if ((int) $w['challenge_mode'] === $modeParam) {
                $modeInfo = $w;
                break;
            }
        }
        respond(200, [
            'ok'         => true,
            'view'       => 'mode',
            'mode'       => $modeParam,
            'mode_info'  => $modeInfo,
            'entries'    => $modes[$modeParam],
            'updated_at' => $updated_at,
        ]);
        break;
}

respond(500, ['ok' => false, 'message' => 'Error inesperado.']);

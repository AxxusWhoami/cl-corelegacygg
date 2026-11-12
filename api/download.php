<?php
// Endpoint de registro de descargas de cliente.
// POST /api/download.php  →  recibe JSON: { "client_type": 1 | 2 }
//   - 1 = cliente normal (CoRe_Legacy.zip)
//   - 2 = cliente HD     (CoRe_Legacy_HD.zip)
// Crea la tabla `download_log` en la base $DB_WEB si no existe.
// Cada descarga inserta una fila con id autonumérico, tipo y timestamp.
// No devuelve ningún contador visible — solo ok/error.
// PHP 7.4 · mysqli · prepared statements.

declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');
header('X-Content-Type-Options: nosniff');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Client-Info, Apikey');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'message' => 'Método no permitido.'], JSON_UNESCAPED_UNICODE);
    exit;
}

require __DIR__ . '/../params.php';
require __DIR__ . '/ratelimit.php';
check_rate_limit($DDOS_REDIS_ENABLE, $DDOS_REDIS_SOCKET, $DDOS_REDIS_PASS, $DDOS_REDIS_DB, $DDOS_REDIS_PREFIX, 60, 20);

function respond(int $status, array $payload): void
{
    http_response_code($status);
    echo json_encode($payload, JSON_UNESCAPED_UNICODE);
    exit;
}

// ===== Leer y validar entrada JSON =====
$raw = file_get_contents('php://input');
$body = json_decode($raw, true);

if (!is_array($body)) {
    respond(400, ['ok' => false, 'message' => 'Petición inválida.']);
}

$clientType = $body['client_type'] ?? null;

if (!is_int($clientType) || !in_array($clientType, [1, 2], true)) {
    respond(400, ['ok' => false, 'message' => 'Tipo de cliente inválido.']);
}

// ===== Conectar a MySQL y crear tabla si no existe =====
mysqli_report(MYSQLI_REPORT_OFF);
$conn = @mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_WEB, (int) $DB_PORT);
if (!$conn) {
    respond(503, ['ok' => false, 'message' => 'No se pudo conectar a la base de datos.']);
}
mysqli_set_charset($conn, 'utf8mb4');

$createSql = "CREATE TABLE IF NOT EXISTS `download_log` ("
    . "`id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, "
    . "`client_type` TINYINT UNSIGNED NOT NULL, "
    . "`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, "
    . "INDEX `idx_type_created` (`client_type`, `created_at` DESC)"
    . ") ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
mysqli_query($conn, $createSql);

// ===== Insertar registro de descarga =====
$sql = "INSERT INTO `download_log` (`client_type`) VALUES (?)";
$stmt = mysqli_prepare($conn, $sql);
if (!$stmt) {
    mysqli_close($conn);
    respond(500, ['ok' => false, 'message' => 'Error al preparar la inserción.']);
}

mysqli_stmt_bind_param($stmt, 'i', $clientType);

if (!mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    respond(500, ['ok' => false, 'message' => 'No se pudo registrar la descarga.']);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);

respond(200, ['ok' => true]);

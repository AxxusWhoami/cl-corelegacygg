<?php
// Endpoint de registro de descargas de cliente.
// POST /api/download.php  →  recibe JSON: { "client_type": 1 | 2 }
//   - 1 = cliente normal (CoRe_Legacy.zip)
//   - 2 = cliente HD     (CoRe_Legacy_HD.zip)
// Crea la tabla `download_log` en la base $DB_WEB si no existe.
// Cada descarga inserta una fila con id autonumérico, tipo, IP, país y timestamp.
// La IP y el país se obtienen de las cabeceras de Cloudflare (CF-Connecting-IP / CF-IPCountry).
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

// ===== Obtener IP y país de las cabeceras de Cloudflare =====
$ip = $_SERVER['HTTP_CF_CONNECTING_IP'] ?? ($_SERVER['REMOTE_ADDR'] ?? '');
if ($ip !== '' && filter_var($ip, FILTER_VALIDATE_IP) === false) {
    $ip = '';
}
$country = $_SERVER['HTTP_CF_IPCOUNTRY'] ?? '';
if ($country !== '' && mb_strlen($country) > 4) {
    $country = '';
}

// ===== Conectar a MySQL y crear tabla si no existe =====
mysqli_report(MYSQLI_REPORT_OFF);
$conn = @mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_WEB, (int) $DB_PORT);
if (!$conn) {
    respond(503, ['ok' => false, 'message' => 'No se pudo conectar a la base de datos.']);
}
mysqli_set_charset($conn, 'utf8mb4');

// CREATE TABLE no admite IF NOT EXISTS en ALTER, así que creamos primero la tabla base
// y luego añadimos las columnas nuevas si la tabla ya existía de una versión anterior.
$createSql = "CREATE TABLE IF NOT EXISTS `download_log` ("
    . "`id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, "
    . "`client_type` TINYINT UNSIGNED NOT NULL, "
    . "`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, "
    . "INDEX `idx_type_created` (`client_type`, `created_at` DESC)"
    . ") ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
mysqli_query($conn, $createSql);

// Añadir columnas IP y país si no existen (tabla ya creada en una versión anterior).
$cols = [];
$res = mysqli_query($conn, "SHOW COLUMNS FROM `download_log` LIKE 'ip'");
if ($res && mysqli_num_rows($res) === 0) {
    $cols[] = "ADD COLUMN `ip` VARCHAR(45) DEFAULT NULL";
}
$res2 = mysqli_query($conn, "SHOW COLUMNS FROM `download_log` LIKE 'country'");
if ($res2 && mysqli_num_rows($res2) === 0) {
    $cols[] = "ADD COLUMN `country` VARCHAR(4) DEFAULT NULL";
}
if (!empty($cols)) {
    mysqli_query($conn, "ALTER TABLE `download_log` " . implode(', ', $cols));
}

// ===== Insertar registro de descarga =====
$sql = "INSERT INTO `download_log` (`client_type`, `ip`, `country`) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);
if (!$stmt) {
    mysqli_close($conn);
    respond(500, ['ok' => false, 'message' => 'Error al preparar la inserción.']);
}

$ipVal = $ip !== '' ? $ip : null;
$countryVal = $country !== '' ? $country : null;
mysqli_stmt_bind_param($stmt, 'iss', $clientType, $ipVal, $countryVal);

if (!mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    respond(500, ['ok' => false, 'message' => 'No se pudo registrar la descarga.']);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);

respond(200, ['ok' => true]);

<?php
// Endpoint de suscripción al aviso de apertura del reino.
// PHP 7.4 · mysqli · prepared statements

declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');
header('X-Content-Type-Options: nosniff');

require __DIR__ . '/../params.php';

function respond(int $status, array $payload): void
{
    http_response_code($status);
    echo json_encode($payload, JSON_UNESCAPED_UNICODE);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    respond(405, ['ok' => false, 'message' => 'Método no permitido.']);
}

// Leer cuerpo JSON o datos de formulario.
$raw = file_get_contents('php://input');
$email = '';

if ($raw !== false && $raw !== '') {
    $data = json_decode($raw, true);
    if (is_array($data) && isset($data['email'])) {
        $email = trim((string) $data['email']);
    }
}

if ($email === '' && isset($_POST['email'])) {
    $email = trim((string) $_POST['email']);
}

// Validación del email en el servidor.
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 254) {
    respond(422, ['ok' => false, 'message' => 'El correo electrónico no es válido.']);
}

// País del visitante leído de la cabecera de Cloudflare.
$country = $_SERVER['HTTP_CF_IPCOUNTRY'] ?? 'XX';
$country = strtoupper(substr(preg_replace('/[^A-Za-z]/', '', $country), 0, 2));
if ($country === '') {
    $country = 'XX';
}

mysqli_report(MYSQLI_REPORT_OFF);

// Conexión inicial sin base de datos para poder crearla si no existe.
$conn = @mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, '', (int) $DB_PORT);
if (!$conn) {
    respond(500, ['ok' => false, 'message' => 'No se pudo conectar a la base de datos.']);
}

mysqli_set_charset($conn, 'utf8mb4');

$dbNameEscaped = mysqli_real_escape_string($conn, $DB_AUTH);
$createDb = "CREATE DATABASE IF NOT EXISTS `{$dbNameEscaped}` "
    . "CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
if (!mysqli_query($conn, $createDb)) {
    mysqli_close($conn);
    respond(500, ['ok' => false, 'message' => 'No se pudo preparar la base de datos.']);
}

if (!mysqli_select_db($conn, $DB_AUTH)) {
    mysqli_close($conn);
    respond(500, ['ok' => false, 'message' => 'No se pudo seleccionar la base de datos.']);
}

// Crear la tabla si no existe en la primera ejecución.
$createTable = "CREATE TABLE IF NOT EXISTS `launch_newsletter` ("
    . "`id` INT UNSIGNED NOT NULL AUTO_INCREMENT, "
    . "`email` VARCHAR(254) NOT NULL, "
    . "`country` CHAR(2) NOT NULL DEFAULT 'XX', "
    . "`created_at` DATETIME NOT NULL, "
    . "PRIMARY KEY (`id`), "
    . "UNIQUE KEY `uniq_email` (`email`)"
    . ") ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
if (!mysqli_query($conn, $createTable)) {
    mysqli_close($conn);
    respond(500, ['ok' => false, 'message' => 'No se pudo preparar la tabla.']);
}

// Inserción con prepared statement; si el email ya existe, no se duplica.
$createdAt = date('Y-m-d H:i:s');
$sql = "INSERT INTO `launch_newsletter` (`email`, `country`, `created_at`) "
    . "VALUES (?, ?, ?) "
    . "ON DUPLICATE KEY UPDATE `id` = `id`";

$stmt = mysqli_prepare($conn, $sql);
if (!$stmt) {
    mysqli_close($conn);
    respond(500, ['ok' => false, 'message' => 'No se pudo registrar el correo.']);
}

mysqli_stmt_bind_param($stmt, 'sss', $email, $country, $createdAt);
$success = mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);
mysqli_close($conn);

if (!$success) {
    respond(500, ['ok' => false, 'message' => 'No se pudo registrar el correo.']);
}

respond(200, ['ok' => true, 'message' => 'Tu correo ha sido guardado. Te avisaremos de la apertura del reino.']);

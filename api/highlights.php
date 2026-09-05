<?php
// Endpoint de envío de capturas/videos de la comunidad para revisión.
// POST /api/highlights.php  →  recibe un formulario multipart/form-data con:
//   - player_name  (string, obligatorio, máx. 32)
//   - email        (string, obligatorio, máx. 120)
//   - media_type   (string: 'screenshot' | 'video', obligatorio)
//   - title        (string, obligatorio, máx. 120)
//   - description  (string, obligatorio, máx. 500)
//   - media_file   (fichero, obligatorio si media_type=screenshot) — captura subida por el usuario
//   - media_url    (string, obligatorio si media_type=video) — URL del video de YouTube
// El fichero se guarda en /communityfootage/  (relativo a la raíz del proyecto).
// El registro se guarda en la tabla `community_highlights` de la base $DB_WEB.
// PHP 7.4 · mysqli · prepared statements · sin galería pública.

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
    echo json_encode(['ok' => false, 'message' => 'Método no permitido.']);
    exit;
}

require __DIR__ . '/../params.php';

function respond(int $status, array $payload): void
{
    http_response_code($status);
    echo json_encode($payload, JSON_UNESCAPED_UNICODE);
    exit;
}

// ===== Verificar Cloudflare Turnstile =====
$turnstileResponse = trim($_POST['cf_turnstile_response'] ?? '');
if ($turnstileResponse === '' || strlen($turnstileResponse) > 2048) {
    respond(400, ['ok' => false, 'message' => 'Debes completar la verificación de seguridad.']);
}

$turnstilePayload = http_build_query([
    'secret'   => $TURNSTILE_SECRET_KEY,
    'response' => $turnstileResponse,
    'remoteip' => $_SERVER['REMOTE_ADDR'] ?? '',
]);

$ch = curl_init('https://challenges.cloudflare.com/turnstile/v0/siteverify');
curl_setopt_array($ch, [
    CURLOPT_POST          => true,
    CURLOPT_POSTFIELDS    => $turnstilePayload,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT       => 10,
    CURLOPT_HTTPHEADER    => ['Content-Type: application/x-www-form-urlencoded'],
]);
$turnstileResult = curl_exec($ch);
curl_close($ch);

if ($turnstileResult === false) {
    respond(503, ['ok' => false, 'message' => 'No se pudo verificar el captcha. Inténtalo de nuevo.']);
}

$turnstileData = json_decode($turnstileResult, true);
if (!is_array($turnstileData) || empty($turnstileData['success'])) {
    respond(403, ['ok' => false, 'message' => 'La verificación de seguridad ha fallado. Inténtalo de nuevo.']);
}

if (($turnstileData['action'] ?? '') !== $TURNSTILE_ACTION) {
    respond(403, ['ok' => false, 'message' => 'Verificación de seguridad inválida.']);
}

$turnstileHostname = $turnstileData['hostname'] ?? '';
if (!in_array($turnstileHostname, $TURNSTILE_HOSTNAMES, true)) {
    respond(403, ['ok' => false, 'message' => 'Verificación de seguridad inválida.']);
}

// ===== Validar y procesar entrada =====
$playerName  = trim($_POST['player_name']  ?? '');
$email       = trim($_POST['email']        ?? '');
$mediaType   = trim($_POST['media_type']   ?? '');
$title       = trim($_POST['title']        ?? '');
$description = trim($_POST['description']  ?? '');

if ($playerName === '' || mb_strlen($playerName) > 32) {
    respond(400, ['ok' => false, 'message' => 'El nombre del personaje es obligatorio (máx. 32 caracteres).']);
}
if ($email === '' || mb_strlen($email) > 120 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    respond(400, ['ok' => false, 'message' => 'Debes proporcionar un email de contacto válido.']);
}
if (!in_array($mediaType, ['screenshot', 'video'], true)) {
    respond(400, ['ok' => false, 'message' => 'El tipo de contenido debe ser "captura" o "video".']);
}
if ($title === '' || mb_strlen($title) > 120) {
    respond(400, ['ok' => false, 'message' => 'El título es obligatorio (máx. 120 caracteres).']);
}
if ($description === '' || mb_strlen($description) > 500) {
    respond(400, ['ok' => false, 'message' => 'La descripción es obligatoria (máx. 500 caracteres).']);
}

$uploadDir   = __DIR__ . '/../communityfootage';
$maxFileSize = 10 * 1024 * 1024; // 10 MB

$storedUrl = '';

if ($mediaType === 'video') {
    // ===== Validar URL de YouTube =====
    $youtubeUrl = trim($_POST['media_url'] ?? '');
    if ($youtubeUrl === '' || mb_strlen($youtubeUrl) > 512) {
        respond(400, ['ok' => false, 'message' => 'Debes proporcionar una URL de YouTube válida.']);
    }
    if (!preg_match('#^https?://(www\.)?(youtube\.com/(watch\?v=|embed/|shorts/)|youtu\.be/)[\w-]{11}#i', $youtubeUrl)) {
        respond(400, ['ok' => false, 'message' => 'La URL no es un enlace válido de YouTube.']);
    }
    $storedUrl = $youtubeUrl;
} else {
    // ===== Validar archivo subido (screenshot) =====
    if (!isset($_FILES['media_file']) || $_FILES['media_file']['error'] === UPLOAD_ERR_NO_FILE) {
        respond(400, ['ok' => false, 'message' => 'Debes seleccionar un archivo para subir.']);
    }

    $file = $_FILES['media_file'];
    if ($file['error'] !== UPLOAD_ERR_OK) {
        $msg = $file['error'] === UPLOAD_ERR_INI_SIZE || $file['error'] === UPLOAD_ERR_FORM_SIZE
            ? 'El archivo es demasiado grande (máx. 10 MB).'
            : 'Error al subir el archivo.';
        respond(400, ['ok' => false, 'message' => $msg]);
    }
    if ($file['size'] > $maxFileSize) {
        respond(400, ['ok' => false, 'message' => 'El archivo supera el tamaño máximo de 10 MB.']);
    }

    $allowedMime = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $detectedMime = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);

    if (!in_array($detectedMime, $allowedMime, true)) {
        respond(400, ['ok' => false, 'message' => 'El archivo debe ser un formato válido (JPG, PNG, GIF o WebP).']);
    }

    $extMap = ['image/jpeg' => 'jpg', 'image/png' => 'png', 'image/gif' => 'gif', 'image/webp' => 'webp'];

    $ext = $extMap[$detectedMime];
    $safeName = 'hl_' . date('Ymd_His') . '_' . bin2hex(random_bytes(6)) . '.' . $ext;

    if (!is_dir($uploadDir)) {
        @mkdir($uploadDir, 0755, true);
    }
    if (!is_dir($uploadDir)) {
        respond(500, ['ok' => false, 'message' => 'No se pudo crear la carpeta de almacenamiento.']);
    }

    if (!move_uploaded_file($file['tmp_name'], $uploadDir . '/' . $safeName)) {
        respond(500, ['ok' => false, 'message' => 'No se pudo guardar el archivo.']);
    }
    $storedUrl = '/communityfootage/' . $safeName;
}

// ===== Guardar en MySQL =====
mysqli_report(MYSQLI_REPORT_OFF);
$conn = @mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_WEB, (int) $DB_PORT);
if (!$conn) {
    respond(503, ['ok' => false, 'message' => 'No se pudo conectar a la base de datos.']);
}
mysqli_set_charset($conn, 'utf8mb4');

// Crear tabla si no existe
$createSql = "CREATE TABLE IF NOT EXISTS `community_highlights` ("
    . "`id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, "
    . "`player_name` VARCHAR(32) NOT NULL, "
    . "`email` VARCHAR(120) NOT NULL, "
    . "`media_type` ENUM('screenshot','video') NOT NULL, "
    . "`media_url` VARCHAR(512) NOT NULL, "
    . "`title` VARCHAR(120) NOT NULL, "
    . "`description` VARCHAR(500) DEFAULT NULL, "
    . "`status` ENUM('pending','approved','rejected') NOT NULL DEFAULT 'pending', "
    . "`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, "
    . "INDEX `idx_status_created` (`status`, `created_at` DESC)"
    . ") ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
mysqli_query($conn, $createSql);

$sql = "INSERT INTO `community_highlights` "
     . "(`player_name`, `email`, `media_type`, `media_url`, `title`, `description`, `status`) "
     . "VALUES (?, ?, ?, ?, ?, ?, 'pending')";

$stmt = mysqli_prepare($conn, $sql);
if (!$stmt) {
    mysqli_close($conn);
    respond(500, ['ok' => false, 'message' => 'Error al preparar la inserción.']);
}

mysqli_stmt_bind_param($stmt, 'ssssss', $playerName, $email, $mediaType, $storedUrl, $title, $description);

if (!mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    respond(500, ['ok' => false, 'message' => 'No se pudo guardar el envío.']);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);

// ===== Enviar notificación por correo al equipo =====
$mailSent = false;
$mailError = '';

try {
    require_once __DIR__ . '/../lib/PHPMailer/src/PHPMailer.php';
    require_once __DIR__ . '/../lib/PHPMailer/src/SMTP.php';
    require_once __DIR__ . '/../lib/PHPMailer/src/Exception.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer(true);
    $mail->isSMTP();
    $mail->Host       = $MAIL_HOST;
    $mail->Port       = (int) $MAIL_PORT;
    $mail->SMTPSecure = $MAIL_SECURE;
    $mail->SMTPAuth   = true;
    $mail->Username   = $MAIL_USER;
    $mail->Password   = $MAIL_PASS;
    $mail->CharSet    = $MAIL_CHARSET;
    $mail->SMTPDebug  = (int) $MAIL_DEBUG;

    $mail->setFrom($MAIL_FROM, $MAIL_FROM_NAME);
    $mail->addAddress('team@corelegacy.gg', 'Equipo Core Legacy');
    $mail->addReplyTo($email, $playerName);

    $mail->Subject = 'Nuevo envío de contenido: ' . $title;

    $typeLabel = $mediaType === 'video' ? 'Video de YouTube' : 'Captura de pantalla';
    $mediaLink = $mediaType === 'video'
        ? $storedUrl
        : 'https://corelegacy.gg' . $storedUrl;

    $mail->isHTML(true);
    $mail->Body =
        '<h2>Nuevo envío de contenido comunitario</h2>'
        . '<table style="border-collapse:collapse;font-family:sans-serif;font-size:14px;line-height:1.6">'
        . '<tr><td style="padding:4px 12px 4px 0;color:#666;font-weight:bold">Autor:</td><td>' . htmlspecialchars($playerName, ENT_QUOTES, 'UTF-8') . '</td></tr>'
        . '<tr><td style="padding:4px 12px 4px 0;color:#666;font-weight:bold">Email de contacto:</td><td>' . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . '</td></tr>'
        . '<tr><td style="padding:4px 12px 4px 0;color:#666;font-weight:bold">Tipo:</td><td>' . $typeLabel . '</td></tr>'
        . '<tr><td style="padding:4px 12px 4px 0;color:#666;font-weight:bold">Título:</td><td>' . htmlspecialchars($title, ENT_QUOTES, 'UTF-8') . '</td></tr>'
        . '<tr><td style="padding:4px 12px 4px 0;color:#666;font-weight:bold">Descripción:</td><td>' . nl2br(htmlspecialchars($description, ENT_QUOTES, 'UTF-8')) . '</td></tr>'
        . '<tr><td style="padding:4px 12px 4px 0;color:#666;font-weight:bold">Enlace al material:</td><td><a href="' . htmlspecialchars($mediaLink, ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($mediaLink, ENT_QUOTES, 'UTF-8') . '</a></td></tr>'
        . '</table>'
        . '<p style="margin-top:16px;font-size:12px;color:#999">Responde a este correo para contactar directamente con el autor (' . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . ').</p>';

    $mail->AltBody =
        "Nuevo envío de contenido comunitario\n\n"
        . "Autor: $playerName\n"
        . "Email de contacto: $email\n"
        . "Tipo: $typeLabel\n"
        . "Título: $title\n"
        . "Descripción: $description\n"
        . "Enlace al material: $mediaLink\n\n"
        . "Responde a este correo para contactar directamente con el autor ($email).";

    $mail->send();
    $mailSent = true;
} catch (PHPMailer\PHPMailer\Exception $e) {
    $mailError = $e->getMessage();
} catch (Throwable $e) {
    $mailError = $e->getMessage();
}

respond(200, ['ok' => true, 'message' => '¡Envío recibido! Tu contenido será revisado por el equipo antes de publicarse en nuestras redes sociales.']);

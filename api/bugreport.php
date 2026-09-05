<?php
// Endpoint de reporte de bugs para el panel de Ayuda y soporte.
// POST /api/bugreport.php  →  recibe un formulario multipart/form-data con:
//   - player_name  (string, obligatorio, máx. 32)
//   - account      (string, obligatorio, máx. 32)
//   - email        (string, obligatorio, máx. 120)
//   - category     (string: quests|spells|pve|pvp|loot|npc|bots|web|exploits|other, obligatorio)
//   - subject      (string, obligatorio, máx. 120)
//   - description  (string, obligatorio, máx. 2000)
//   - cf_turnstile_response (string, obligatorio — token de Cloudflare Turnstile)
// Envía un correo a team@corelegacy.gg con Reply-To al email del usuario.
// PHP 7.4 · PHPMailer · sin galería pública.

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

if (!in_array($turnstileData['action'] ?? '', $TURNSTILE_ACTIONS, true)) {
    respond(403, ['ok' => false, 'message' => 'Verificación de seguridad inválida.']);
}

$turnstileHostname = $turnstileData['hostname'] ?? '';
if (!in_array($turnstileHostname, $TURNSTILE_HOSTNAMES, true)) {
    respond(403, ['ok' => false, 'message' => 'Verificación de seguridad inválida.']);
}

// ===== Validar entrada =====
$playerName  = trim($_POST['player_name']  ?? '');
$account    = trim($_POST['account']      ?? '');
$email       = trim($_POST['email']        ?? '');
$category   = trim($_POST['category']     ?? '');
$subject    = trim($_POST['subject']      ?? '');
$description = trim($_POST['description']  ?? '');

if ($playerName === '' || mb_strlen($playerName) > 32) {
    respond(400, ['ok' => false, 'message' => 'El nombre del personaje es obligatorio (máx. 32 caracteres).']);
}
if ($account === '' || mb_strlen($account) > 32) {
    respond(400, ['ok' => false, 'message' => 'El nombre de la cuenta es obligatorio (máx. 32 caracteres).']);
}
if ($email === '' || mb_strlen($email) > 120 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    respond(400, ['ok' => false, 'message' => 'Debes proporcionar un email de contacto válido.']);
}
$validCategories = [
    'quests'   => 'Misiones (Quests)',
    'spells'   => 'Clases y Hechizos',
    'pve'      => 'Mazmorras y Bandas (PvE)',
    'pvp'      => 'Campos de Batalla y Arenas (PvP)',
    'loot'     => 'Objetos y Botín (Loot)',
    'npc'      => 'NPCs y Entorno',
    'bots'     => 'IA de Playerbots y Chat',
    'web'      => 'Cuenta y Tienda Web',
    'exploits' => 'Exploits o Abuso',
    'other'    => 'Otros',
];
if (!array_key_exists($category, $validCategories)) {
    respond(400, ['ok' => false, 'message' => 'Debes seleccionar una categoría válida.']);
}
if ($subject === '' || mb_strlen($subject) > 120) {
    respond(400, ['ok' => false, 'message' => 'El asunto es obligatorio (máx. 120 caracteres).']);
}
if ($description === '' || mb_strlen($description) > 2000) {
    respond(400, ['ok' => false, 'message' => 'La descripción es obligatoria (máx. 2000 caracteres).']);
}

// ===== Enviar correo al equipo =====
$categoryLabel = $validCategories[$category];

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

    $mail->Subject = '[Bug Report] ' . $subject;

    $mail->isHTML(true);
    $mail->Body =
        '<h2>Nuevo reporte de bug</h2>'
        . '<table style="border-collapse:collapse;font-family:sans-serif;font-size:14px;line-height:1.6">'
        . '<tr><td style="padding:4px 12px 4px 0;color:#666;font-weight:bold">Personaje:</td><td>' . htmlspecialchars($playerName, ENT_QUOTES, 'UTF-8') . '</td></tr>'
        . '<tr><td style="padding:4px 12px 4px 0;color:#666;font-weight:bold">Cuenta:</td><td>' . htmlspecialchars($account, ENT_QUOTES, 'UTF-8') . '</td></tr>'
        . '<tr><td style="padding:4px 12px 4px 0;color:#666;font-weight:bold">Email de contacto:</td><td>' . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . '</td></tr>'
        . '<tr><td style="padding:4px 12px 4px 0;color:#666;font-weight:bold">Categoría:</td><td>' . htmlspecialchars($categoryLabel, ENT_QUOTES, 'UTF-8') . '</td></tr>'
        . '<tr><td style="padding:4px 12px 4px 0;color:#666;font-weight:bold">Asunto:</td><td>' . htmlspecialchars($subject, ENT_QUOTES, 'UTF-8') . '</td></tr>'
        . '</table>'
        . '<h3 style="margin-top:16px;font-size:14px;color:#333">Descripción del bug</h3>'
        . '<div style="font-family:sans-serif;font-size:14px;line-height:1.6;white-space:pre-wrap">' . nl2br(htmlspecialchars($description, ENT_QUOTES, 'UTF-8')) . '</div>'
        . '<p style="margin-top:16px;font-size:12px;color:#999">Responde a este correo para contactar directamente con el autor (' . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . ').</p>';

    $mail->AltBody =
        "Nuevo reporte de bug\n\n"
        . "Personaje: $playerName\n"
        . "Cuenta: $account\n"
        . "Email de contacto: $email\n"
        . "Categoría: $categoryLabel\n"
        . "Asunto: $subject\n\n"
        . "Descripción del bug:\n$description\n\n"
        . "Responde a este correo para contactar directamente con el autor ($email).";

    $mail->send();
} catch (PHPMailer\PHPMailer\Exception $e) {
    respond(500, ['ok' => false, 'message' => 'No se pudo enviar el reporte. Inténtalo de nuevo más tarde.']);
} catch (Throwable $e) {
    respond(500, ['ok' => false, 'message' => 'No se pudo enviar el reporte. Inténtalo de nuevo más tarde.']);
}

respond(200, ['ok' => true, 'message' => '¡Reporte enviado! El equipo revisará el bug lo antes posible. Gracias por tu colaboración.']);

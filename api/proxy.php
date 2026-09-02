<?php
// Proxy CORS para assets del visor 3D de WoW (Wowhead/ZAM).
// Permite que el visor 3D cargue modelos, texturas y metadatos desde los servidores de Wowhead.

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
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

$url = $_GET['url'] ?? '';
if ($url === '') {
    http_response_code(400);
    echo json_encode(['error' => 'Missing url parameter']);
    exit;
}

$parsed = parse_url($url);
if ($parsed === false || !isset($parsed['scheme']) || !isset($parsed['host'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid URL']);
    exit;
}

if (!in_array($parsed['scheme'], ['http', 'https'], true)) {
    http_response_code(400);
    echo json_encode(['error' => 'Only http/https allowed']);
    exit;
}

$allowedHosts = [
    'wow.zamimg.com',
    'www.wow.zamimg.com',
    'wotlk.murlocvillage.com',
    'wotlk.evowow.com',
    'nether.wowhead.com',
];

if (!in_array($parsed['host'], $allowedHosts, true)) {
    http_response_code(403);
    echo json_encode(['error' => 'Host not allowed']);
    exit;
}

$ch = curl_init($url);
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_MAXREDIRS => 5,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_SSL_VERIFYPEER => true,
    CURLOPT_HTTPHEADER => [
        'Referer: https://wowhead.com',
        'Origin: https://wowhead.com',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
    ],
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$contentType = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
curl_close($ch);

if ($response === false) {
    http_response_code(502);
    echo json_encode(['error' => 'Failed to fetch resource']);
    exit;
}

header('Cache-Control: public, max-age=86400');
if ($contentType) {
    header('Content-Type: ' . $contentType);
} else {
    header('Content-Type: application/octet-stream');
}
http_response_code($httpCode);
echo $response;

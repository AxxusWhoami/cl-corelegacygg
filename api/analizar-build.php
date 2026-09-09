<?php
declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');
header('X-Content-Type-Options: nosniff');
header('Cache-Control: no-store');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type');
    http_response_code(204);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Método no permitido']);
    exit;
}

require_once __DIR__ . '/../params.php';

$rawBody = file_get_contents('php://input');
if ($rawBody === false || strlen($rawBody) > 24000) {
    http_response_code(413);
    echo json_encode(['error' => 'La build enviada es demasiado grande']);
    exit;
}

$payload = json_decode($rawBody, true);
$class = is_array($payload) && isset($payload['class']) && is_string($payload['class']) ? trim($payload['class']) : '';
$goal = is_array($payload) && isset($payload['goal']) && is_string($payload['goal']) ? trim($payload['goal']) : '';
$talents = is_array($payload) && isset($payload['talents']) && is_array($payload['talents']) ? $payload['talents'] : [];
$allowedGoals = ['general', 'icc', 'pvp', 'ia', 'dungeons'];

if ($class === '' || !in_array($goal, $allowedGoals, true) || count($talents) > 120) {
    http_response_code(400);
    echo json_encode(['error' => 'Datos de build no válidos']);
    exit;
}

$cleanTalents = [];
foreach ($talents as $talent) {
    if (!is_array($talent) || !isset($talent['tree'], $talent['name'], $talent['rank'])) {
        continue;
    }
    if (!is_string($talent['tree']) || !is_string($talent['name']) || !is_int($talent['rank']) || $talent['rank'] < 0 || $talent['rank'] > 5) {
        continue;
    }
    $cleanTalents[] = [
        'tree' => substr($talent['tree'], 0, 80),
        'name' => substr($talent['name'], 0, 100),
        'rank' => $talent['rank'],
    ];
}

$goalLabels = [
    'general' => 'una evaluación general',
    'icc' => 'optimizar el rendimiento en Ciudadela de la Corona de Hielo (ICC)',
    'pvp' => 'optimizar el rendimiento en PvP',
    'ia' => 'jugar con compañeros IA de CoRe Legacy',
    'dungeons' => 'optimizar el rendimiento en mazmorras',
];

$prompt = 'Analiza esta build de talentos de World of Warcraft Wrath of the Lich King 3.3.5a para ' . $class . '. El objetivo es ' . $goalLabels[$goal] . ".\n\n";
$prompt .= "Responde en español con estas secciones breves y prácticas:\n1. Veredicto (máximo 2 frases).\n2. Lo que funciona (2-3 puntos).\n3. Puntos de eficiencia perdidos (indica los puntos concretos si los hay).\n4. Cambios recomendados (máximo 4 cambios, con nombre del talento).\n5. Distribución sugerida entre árboles.\nNo inventes talentos que no aparezcan en la lista y aclara si la información disponible es insuficiente.\n\nTalentos seleccionados:\n" . json_encode($cleanTalents, JSON_UNESCAPED_UNICODE);

$request = json_encode([
    'model' => 'gpt-4o-mini',
    'temperature' => 0.25,
    'max_tokens' => 650,
    'messages' => [
        ['role' => 'system', 'content' => 'Eres un theorycrafter experto en WotLK 3.3.5a. Sé preciso, honesto y útil.'],
        ['role' => 'user', 'content' => $prompt],
    ],
], JSON_UNESCAPED_UNICODE);

$curl = curl_init('https://api.openai.com/v1/chat/completions');
curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_TIMEOUT => 35,
    CURLOPT_HTTPHEADER => [
        'Authorization: Bearer ' . $openai_key,
        'Content-Type: application/json',
    ],
    CURLOPT_POSTFIELDS => $request,
]);
$response = curl_exec($curl);
$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
curl_close($curl);

if ($response === false || $status < 200 || $status >= 300) {
    http_response_code(502);
    echo json_encode(['error' => 'No se pudo completar el análisis en este momento']);
    exit;
}

$decoded = json_decode($response, true);
$content = $decoded['choices'][0]['message']['content'] ?? null;
if (!is_string($content) || $content === '') {
    http_response_code(502);
    echo json_encode(['error' => 'La respuesta del analizador no tenía un formato válido']);
    exit;
}

echo json_encode(['analysis' => $content], JSON_UNESCAPED_UNICODE);

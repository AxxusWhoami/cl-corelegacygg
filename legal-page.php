<?php
$path = rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

$metaMap = [
    '/sobre-nosotros' => [
        'title' => 'Sobre nosotros — CoRe Legacy',
        'description' => 'Conoce quiénes somos y hacia dónde va CoRe Legacy: un proyecto de antiguos miembros de WoW CoRe con nuevas mecánicas, QoL e IA.',
        'canonical' => 'https://corelegacy.gg/sobre-nosotros',
    ],
    '/terminos-de-servicio' => [
        'title' => 'Términos de Servicio — CoRe Legacy',
        'description' => 'Términos de Servicio de CoRe Legacy, servidor WoW WotLK 3.3.5a. Reglas de cuenta, conducta, donaciones y derechos de la administración.',
        'canonical' => 'https://corelegacy.gg/terminos-de-servicio',
    ],
    '/politica-de-privacidad' => [
        'title' => 'Política de Privacidad — CoRe Legacy',
        'description' => 'Política de Privacidad de CoRe Legacy, servidor WoW WotLK 3.3.5a. Qué datos recopilamos, cómo los protegemos, cookies y tus derechos.',
        'canonical' => 'https://corelegacy.gg/politica-de-privacidad',
    ],
];

if (!isset($metaMap[$path])) {
    http_response_code(404);
    exit;
}

$meta = $metaMap[$path];
$html = file_get_contents(__DIR__ . '/index.html');

$replacements = [
    '#<title>[^<]*</title>#' => '<title>' . htmlspecialchars($meta['title'], ENT_QUOTES) . '</title>',
    '#<meta name="description" content="[^"]*"#' => '<meta name="description" content="' . htmlspecialchars($meta['description'], ENT_QUOTES) . '"',
    '#<link rel="canonical" href="[^"]*"#' => '<link rel="canonical" href="' . htmlspecialchars($meta['canonical'], ENT_QUOTES) . '"',
    '#<meta property="og:title" content="[^"]*"#' => '<meta property="og:title" content="' . htmlspecialchars($meta['title'], ENT_QUOTES) . '"',
    '#<meta property="og:description" content="[^"]*"#' => '<meta property="og:description" content="' . htmlspecialchars($meta['description'], ENT_QUOTES) . '"',
    '#<meta property="og:url" content="[^"]*"#' => '<meta property="og:url" content="' . htmlspecialchars($meta['canonical'], ENT_QUOTES) . '"',
    '#<meta name="twitter:title" content="[^"]*"#' => '<meta name="twitter:title" content="' . htmlspecialchars($meta['title'], ENT_QUOTES) . '"',
    '#<meta name="twitter:description" content="[^"]*"#' => '<meta name="twitter:description" content="' . htmlspecialchars($meta['description'], ENT_QUOTES) . '"',
];

foreach ($replacements as $pattern => $replacement) {
    $html = preg_replace($pattern, $replacement, $html, 1);
}

header('Content-Type: text/html; charset=UTF-8');
echo $html;

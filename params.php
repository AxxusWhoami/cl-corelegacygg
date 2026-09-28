<?php
// Configuración de conexión a MySQL para Core Legacy.
// Rellena estos valores con las credenciales reales del servidor.

$DB_HOST    = '127.0.0.1';
$DB_USER    = 'corelegacygg';
$DB_PASS    = 'A0M34kn0DH96tZ';
$DB_AUTH    = 'corelegacygg';
$DB_CHAR    = 'acore_characters';
$DB_WEB     = 'corelegacygg';
$DB_PORT    = 3306;
$DB_CHARSET = 'utf8mb4';

// Tablas del changelog en la base de datos web
$TABLE_CHANGELOG_COMMITS = 'changelog_commits';
$TABLE_CHANGELOG_LANG     = 'changelog_lang';

// ===== OpenAI — análisis de builds =====
$openai_key = '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';

// ===== Redis connection (Unix socket) =====
// Conexión vía socket Unix para menor latencia y mayor seguridad.
// El socket no expone un puerto TCP, reduciendo la superficie de ataque.
// ===== Redis on/off switches =====
// 1 = activado (producción), 0 = desactivado (desarrollo).
// Cuando están en 0, el rate limiter y la caché Armory se saltan sin error.
/* ── Redis connection (Unix socket) DDoS maxmemory-policy allkeys-lru ──── */
$DDOS_REDIS_SOCKET = '/var/run/redis/redis-ddos.sock';
$DDOS_REDIS_PASS   = '';
$DDOS_REDIS_DB     = 0;
$DDOS_REDIS_PREFIX = 'corelegacy:';
$DDOS_REDIS_ENABLE = 0;

/* ── Redis connection (Unix socket) Armory maxmemory-policy volatile-lru ─ */
$ARMORY_REDIS_SOCKET = '/var/run/redis/redis-armory.sock';
$ARMORY_REDIS_PASS   = '';
$ARMORY_REDIS_DB     = 0;
$ARMORY_REDIS_PREFIX = 'corelegacy:';
$ARMORY_REDIS_ENABLE = 0;

// ===== PHPMailer — configuración de envío de correo =====
// Credenciales del servidor SMTP y datos del remitente por defecto.
$MAIL_HOST       = 'pro3.mail.ovh.net';     // Servidor SMTP
$MAIL_PORT       = 587;                     // Puerto (587 = TLS, 465 = SSL)
$MAIL_SECURE     = 'tls';                   // Encriptación: 'tls', 'ssl' o '' (ninguna)
$MAIL_USER       = 'noreply@corelegacy.gg'; // Usuario SMTP (correo de envío)
$MAIL_PASS       = 'E001d2051510e';         // Contraseña SMTP o contraseña de aplicación
$MAIL_FROM       = 'noreply@corelegacy.gg'; // Dirección del remitente
$MAIL_FROM_NAME  = 'Core Legacy';           // Nombre visible del remitente
$MAIL_REPLY_TO   = 'noreply@corelegacy.gg'; // Dirección de respuesta
$MAIL_CHARSET    = 'UTF-8';                 // Juego de caracteres
$MAIL_DEBUG      = 0;                       // 0 = sin log, 1 = errores, 2 = detallado

// ===== Cloudflare Turnstile =====
// Claves para proteger formularios públicos contra bots.
// Obtén las tuyas desde el panel de Cloudflare → Turnstile.
$TURNSTILE_SITE_KEY   = '0x4AAAAAAEpTHjxtASKkn48b';   // Clave pública (se usa en el frontend)
$TURNSTILE_SECRET_KEY = '0x4AAAAAAEpTHnVPu5BOCYGNqp2tufw6fc4';  // Clave secreta (se usa en el backend)
$TURNSTILE_ACTION     = 'highlight_submit';               // Acción esperada del widget
$TURNSTILE_HOSTNAMES  = ['corelegacy.gg'];               // Dominios frontend permitidos
$TURNSTILE_ACTIONS    = ['highlight_submit', 'ticket_submit', 'bug_report']; // Acciones permitidas

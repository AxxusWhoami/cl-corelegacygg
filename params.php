<?php
// Configuración de conexión a MySQL para Core Legacy.
// Rellena estos valores con las credenciales reales del servidor.

$DB_HOST = '127.0.0.1';
$DB_USER = 'corelegacygg';
$DB_PASS = 'A0M34kn0DH96tZ';
$DB_AUTH = 'corelegacygg';
$DB_CHAR = 'acore_characters';
$DB_WEB  = 'corelegacygg';
$DB_PORT = 3306;

// ===== Redis connection (Unix socket) =====
// Conexión vía socket Unix para menor latencia y mayor seguridad.
// El socket no expone un puerto TCP, reduciendo la superficie de ataque.
$REDIS_SOCK   = '/var/run/redis/redis-server.sock';
$REDIS_DB     = 0;
$REDIS_PREFIX = 'corelegacy:';
$REDIS_TTL    = 300; // segundos de caché por defecto

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

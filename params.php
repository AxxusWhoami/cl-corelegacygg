<?php
// Configuración de conexión a MySQL para Core Legacy.
// Rellena estos valores con las credenciales reales del servidor.

$DB_HOST = '127.0.0.1';
$DB_USER = 'corelegacygg';
$DB_PASS = 'A0M34kn0DH96tZ';
$DB_AUTH = 'corelegacygg';
$DB_CHAR = 'acore_characters';
$DB_PORT = 3306;

// ===== Redis connection (Unix socket) =====
// Conexión vía socket Unix para menor latencia y mayor seguridad.
// El socket no expone un puerto TCP, reduciendo la superficie de ataque.
$REDIS_SOCK   = '/var/run/redis/redis-server.sock';
$REDIS_DB     = 0;
$REDIS_PREFIX = 'corelegacy:';
$REDIS_TTL    = 300; // segundos de caché por defecto

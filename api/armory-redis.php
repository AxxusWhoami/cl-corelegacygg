<?php

declare(strict_types=1);

function armory_redis_read(string $key): mixed
{
    global $ARMORY_REDIS_SOCKET, $ARMORY_REDIS_PASS, $ARMORY_REDIS_DB;

    if (!class_exists('Redis', false)) {
        return null;
    }

    try {
        $redis = new Redis();
        if ($redis->connect($ARMORY_REDIS_SOCKET, 0, 1) !== true) {
            return null;
        }
        if ($ARMORY_REDIS_PASS !== '') {
            $redis->auth($ARMORY_REDIS_PASS);
        }
        $redis->select((int) $ARMORY_REDIS_DB);
        $value = $redis->get($key);
        if (!is_string($value) || $value === '') {
            return null;
        }

        $decoded = json_decode($value, true);
        return json_last_error() === JSON_ERROR_NONE ? $decoded : $value;
    } catch (Throwable $e) {
        return null;
    }
}

function armory_redis_read_first(array $keys): mixed
{
    foreach ($keys as $key) {
        $value = armory_redis_read($key);
        if ($value !== null) {
            return $value;
        }
    }

    return null;
}

function armory_redis_read_int(string $key): ?int
{
    global $ARMORY_REDIS_SOCKET, $ARMORY_REDIS_PASS, $ARMORY_REDIS_DB;

    if (!class_exists('Redis', false)) {
        return null;
    }

    try {
        $redis = new Redis();
        if ($redis->connect($ARMORY_REDIS_SOCKET, 0, 1) !== true) {
            return null;
        }
        if ($ARMORY_REDIS_PASS !== '') {
            $redis->auth($ARMORY_REDIS_PASS);
        }
        $redis->select((int) $ARMORY_REDIS_DB);
        $value = $redis->get($key);
        if (!is_string($value) || $value === '') {
            return null;
        }
        return ctype_digit($value) ? (int) $value : null;
    } catch (Throwable $e) {
        return null;
    }
}

function armory_redis_write(string $key, string $value, int $ttlSeconds): bool
{
    global $ARMORY_REDIS_SOCKET, $ARMORY_REDIS_PASS, $ARMORY_REDIS_DB;

    if (!class_exists('Redis', false)) {
        return false;
    }

    try {
        $redis = new Redis();
        if ($redis->connect($ARMORY_REDIS_SOCKET, 0, 1) !== true) {
            return false;
        }
        if ($ARMORY_REDIS_PASS !== '') {
            $redis->auth($ARMORY_REDIS_PASS);
        }
        $redis->select((int) $ARMORY_REDIS_DB);
        return $redis->setex($key, $ttlSeconds, $value);
    } catch (Throwable $e) {
        return false;
    }
}

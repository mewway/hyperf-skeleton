<?php

declare(strict_types=1);

$pool = [
    'min_connections' => 1,
    'max_connections' => 20,
    'connect_timeout' => 3.0,
    'wait_timeout' => 5.0,
    'heartbeat' => -1,
    'max_idle_time' => (float) env('REDIS_MAX_IDLE_TIME', 60),
];
/**
 * This file is part of HuanLeGuang Project, Created by php-cs-fixer 3.0.
 */

return [
    'default' => [
        'host' => env('REDIS_HOST', 'localhost'),
        'auth' => env('REDIS_AUTH', null),
        'port' => (int) env('REDIS_PORT', 6379),
        'db' => (int) env('REDIS_DB', 0),
        'pool' => $pool,
    ],
    'queue' => [
        'host' => env('REDIS_HOST', 'localhost'),
        'auth' => env('REDIS_AUTH', null),
        'port' => (int) env('REDIS_PORT', 6379),
        'db' => (int) env('REDIS_QUEUE_DB', 0),
        'pool' => $pool,
    ],
    'session' => [
        'host' => env('REDIS_HOST', 'localhost'),
        'auth' => env('REDIS_AUTH', null),
        'port' => (int) env('REDIS_PORT', 6379),
        'db' => (int) env('REDIS_SESSION_DB', 0),
        'pool' => $pool,
    ],
    'metric' => [
        'host' => env('REDIS_HOST', 'localhost'),
        'auth' => env('REDIS_AUTH', null),
        'port' => (int) env('REDIS_PORT', 6379),
        'db' => (int) env('REDIS_METRIC_DB', 0),
        'pool' => $pool,
    ],
];

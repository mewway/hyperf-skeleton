<?php

declare(strict_types=1);

/**
 * This file is part of HuanLeGuang Project, Created by php-cs-fixer 3.0.
 */

use Hyperf\Session\Handler;

return [
    'handler' => Handler\RedisHandler::class,
    'options' => [
        'connection' => 'session',
        'path' => BASE_PATH . '/runtime/session',
        'gc_maxlifetime' => 86400,
        'domain' => env('APP_DOMAIN', 'gaoding.com'),
        'session_name' => env('APP_NAME', 'HYPERF_SESSION_ID'),
        'expire_on_close' => true,
        'cookie_lifetime' => 86400 * 3,
    ],
];

<?php

declare(strict_types=1);

/**
 * This file is part of HuanLeGuang Project, Created by php-cs-fixer 3.0.
 */

use Huanhyperf\Logger\Formatter\ConsoleFormatter;
use Huanhyperf\Logger\Formatter\ElkFormatter;
use Huanhyperf\Logger\Handler\StdoutHandler;
use Huanhyperf\Logger\Handler\SyslogUdpHandler;

$level = (int) (env('LOG_LEVEL', Monolog\Logger::INFO));

return [
    'default' => [
        'handlers' => [
            [
                'class' => StdoutHandler::class,
                'constructor' => [
                    'level' => $level,
                ],
                'formatter' => [
                    'class' => ConsoleFormatter::class,
                    'constructor' => [
                        'dateFormat' => 'Y-m-d H:i:s',
                    ],
                ],
            ],
            [
                'class' => SyslogUdpHandler::class,
                'constructor' => [
                    'host' => env('LOG_HOST', '127.0.0.1'),
                    'port' => (int) (env('LOG_PORT', 8001)),
                    'level' => $level,
                    'enable' => ! empty(env('LOG_HOST')),
                ],
                'formatter' => [
                    'class' => ElkFormatter::class,
                    'constructor' => [
                        'app' => env('APP_NAME'),
                        'env' => env('APP_ENV'),
                        'dateFormat' => 'Y-m-d H:i:s',
                    ],
                ],
            ],
        ],
    ],
    'elk' => [
        'handlers' => [
            [
                'class' => SyslogUdpHandler::class,
                'constructor' => [
                    'host' => env('LOG_HOST', '127.0.0.1'),
                    'port' => (int) (env('LOG_PORT', 8001)),
                    'level' => $level,
                    'enable' => ! empty(env('LOG_HOST')),
                ],
                'formatter' => [
                    'class' => ElkFormatter::class,
                    'constructor' => [
                        'app' => env('APP_NAME'),
                        'env' => env('APP_ENV'),
                        'dateFormat' => null,
                    ],
                ],
            ],
        ],
    ],
];

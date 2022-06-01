<?php

declare(strict_types=1);

/**
 * This file is part of HuanLeGuang Project, Created by php-cs-fixer 3.0.
 */

return [
    'handler' => [
        'http' => [
            \App\Exception\Handler\ValidationExceptionHandler::class,
            \App\Exception\Handler\AppServiceExceptionHandler::class,
            Hyperf\HttpServer\Exception\Handler\HttpExceptionHandler::class,
            App\Exception\Handler\BusinessExceptionHandler::class,
        ],
    ],
];

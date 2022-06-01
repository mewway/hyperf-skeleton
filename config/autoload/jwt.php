<?php

declare(strict_types=1);

/**
 * This file is part of HuanLeGuang Project, Created by php-cs-fixer 3.0.
 */

return [
    // client 配置信息
    'client' => [
        'default' => [
            'alg' => 'HS256',
            'secrets' => ['huanhyperf'],
        ],
    ],

    // http client 配置信息
    'http' => [
        'default' => [
            'jwtClient' => 'default',
            'gateway' => 'https://huanhyperf.com/',
            'iss' => 'huanhyperf',
        ],
    ],
];

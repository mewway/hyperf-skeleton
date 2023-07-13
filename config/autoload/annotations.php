<?php

declare(strict_types=1);

/**
 * This file is part of HuanLeGuang Project, Created by php-cs-fixer 3.0.
 */

return [
    'scan' => [
        'paths' => [
            BASE_PATH . '/app',
        ],
        'ignore_annotations' => [
            'mixin',
            'RpcService',
        ],
    ],
];

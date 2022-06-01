<?php

declare(strict_types=1);

/**
 * This file is part of HuanLeGuang Project, Created by php-cs-fixer 3.0.
 */

return [
    'default' => [
        'driver' => Hyperf\Cache\Driver\RedisDriver::class,
        'packer' => Hyperf\Utils\Packer\PhpSerializerPacker::class,
        'prefix' => env('CACHE_PREFIX', 'c:'),
    ],
];

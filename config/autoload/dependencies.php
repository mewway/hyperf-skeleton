<?php

declare(strict_types=1);

/**
 * This file is part of HuanLeGuang Project, Created by php-cs-fixer 3.0.
 */
use Hyperf\JsonRpc\JsonRpcPoolTransporter;
use Hyperf\JsonRpc\JsonRpcTransporter;

return [
    Hyperf\Contract\StdoutLoggerInterface::class => Huanhyperf\Logger\StdoutLoggerFactory::class,
    Prometheus\Storage\Adapter::class => \Huanhyperf\Metric\RedisStorageFactory::class,
    JsonRpcTransporter::class => JsonRpcPoolTransporter::class,
];

<?php

declare(strict_types=1);

/**
 * This file is part of HuanLeGuang Project, Created by php-cs-fixer 3.0.
 */

use Hyperf\ConfigApollo\PullMode;
use Hyperf\ConfigCenter\Mode;

return [
    'enable' => (bool) env('APOLLO_ENABLE', false),
    'driver' => 'apollo',
    'mode' => Mode::PROCESS,
    'drivers' => [
        'apollo' => [
            'driver' => Hyperf\ConfigApollo\ApolloDriver::class,
            'pull_mode' => PullMode::INTERVAL,
            'server' => env('APOLLO_SERVER', 'http://apollo-config.hlgdata.com'),
            'appid' => env('APOLLO_APP_ID', 'notset'),
            'cluster' => 'default',
            'namespaces' => env('APOLLO_NAMESPACE', explode(',', 'application,view')),
            'interval' => 30,
            'strict_mode' => true,
            'client_ip' => current(swoole_get_local_ip()),
            'pullTimeout' => 10,
            'interval_timeout' => 30,
        ],
    ],
];

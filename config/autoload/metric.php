<?php

declare(strict_types=1);

use Hyperf\Metric\Adapter\Prometheus\Constants;

return [
    'default' => env('METRIC_DRIVER', 'noop'),
    'use_standalone_process' => env('METRIC_USE_STANDALONE_PROCESS', true),
    'enable_default_metric' => env('METRIC_ENABLE_DEFAULT_METRIC', true),
    'default_metric_interval' => env('DEFAULT_METRIC_INTERVAL', 5),
    'metric' => [
        'prometheus' => [
            'driver' => Hyperf\Metric\Adapter\Prometheus\MetricFactory::class,
            'mode' => Constants::CUSTOM_MODE,
            'namespace' => env('APP_NAME', 'huanhyperf'),
            'options' => [
                'system_labels' => [
                    'instance' => env('POD_IP', 'notset'),
                    'namespace' => env('POD_NS', 'notset'),
                    'pod' => env('POD_NAME', 'notset'),
                ],
            ],
        ],
        'noop' => [
            'driver' => Hyperf\Metric\Adapter\NoOp\MetricFactory::class,
        ],
    ],
];

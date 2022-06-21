<?php

declare(strict_types=1);

// This file is part of HuanLeGuang Project, Created by php-cs-fixer 3.0.

return [
    // Supported IDEs: "sublime", "textmate", "emacs", "macvim", "phpstorm", "idea",
    //     "vscode", "vscode-insiders", "vscode-remote", "vscode-insiders-remote",
    //     "atom", "nova", "netbeans", "xdebug"
    'ide' => env('DEVTOOL_IDE', 'phpstorm'),
    'env' => [
        'psrMap' => [
            'app' => 'App',
            'test' => 'HyperfTest',
        ],
        'params' => [
            'page' => 'page',
            'pageNum' => 'page_num',
        ],
        'let_maker_reader' => 'yml',
    ],
    'generator' => [
        'amqp' => [
            'consumer' => [
                'namespace' => 'App\\Amqp\\Consumer',
            ],
            'producer' => [
                'namespace' => 'App\\Amqp\\Producer',
            ],
        ],
        'rpc' => [
            'consumer' => [
                'namespace' => 'App\\RpcService\\Consumer',
                'protocol' => 'jsonrpc',
                'server' => 'jsonrpc',
            ],
            'provider' => [
                'namespace' => 'App\\RpcService\\Provider',
                'protocol' => 'jsonrpc',
                'server' => 'jsonrpc',
            ],
        ],
        'aspect' => [
            'namespace' => 'App\\Aspect',
        ],
        'command' => [
            'namespace' => 'App\\Command',
        ],
        'controller' => [
            'namespace' => 'App\\Controller',
            'suffix' => 'Controller',
            'extends' => null,
            'uses' => [],
        ],
        'job' => [
            'namespace' => 'App\\Job',
            'extends' => null,
        ],
        'event' => [
            'namespace' => 'App\\Event',
            'extends' => null,
        ],
        'service' => [
            'namespace' => 'App\\Service',
            'suffix' => 'Service',
            'extends' => null,
            'uses' => [],
        ],
        'listener' => [
            'namespace' => 'App\\Listener',
            'extends' => null,
        ],
        'middleware' => [
            'namespace' => 'App\\Middleware',
            'extends' => null,
        ],
        'process' => [
            'namespace' => 'App\\Process',
            'extends' => null,
        ],
        'request' => [
            'namespace' => 'App\\Request',
            'extends' => null,
        ],
        'import' => [
            'namespace' => 'App\\Import',
            'suffix' => 'Import',
            'extends' => null,
            'uses' => [],
        ],
        'export' => [
            'namespace' => 'App\\Export',
            'suffix' => 'Export',
            'extends' => null,
            'uses' => [],
        ],
        'test' => [
            'namespace' => 'HyperfTest',
            'suffix' => 'Test',
            'extends' => null,
            'uses' => [],
        ],
        'http-test' => [
            'namespace' => 'HyperfTest\\HttpTest',
            'suffix' => 'Test',
            'extends' => null,
            'uses' => [],
        ],
        'doc' => [
        ],
        'env' => [
            'scan_paths' => [
                BASE_PATH . '/config',
            ],
            'env_path' => BASE_PATH . '/.env.example',
        ],
    ],
];

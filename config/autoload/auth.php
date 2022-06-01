<?php

declare(strict_types=1);

/**
 * This file is part of HuanLeGuang Project, Created by php-cs-fixer 3.0.
 */

use Huanhyperf\Auth\Admin\UserProvider as AdminUserProvider;
use Huanhyperf\Auth\GaodingGateway\UserProvider as GaodingGatewayUserProvider;
use Huanhyperf\Auth\Jwt\UserProvider as JwtUserProvider;
use Huanhyperf\Auth\SessionGuard;
use Huanhyperf\Auth\TokenGuard;
use Psr\Http\Message\ServerRequestInterface;

return [
    'admin' => [
        'class' => SessionGuard::class,
        'constructor' => [
            'userProvider' => [
                'class' => AdminUserProvider::class,
                'constructor' => [
                    'projectId' => 1,
                    'test_admin' => env('TEST_ADMIN'),
                ],
            ],
        ],
    ],
    'gaoding_gateway' => [
        'class' => TokenGuard::class,
        'constructor' => [
            'userProvider' => GaodingGatewayUserProvider::class,
            'parseCredentials' => function (ServerRequestInterface $request) {
                return [
                    'user_info' => $request->getHeaderLine('user-info'),
                    'org_info' => $request->getHeaderLine('org-info'),
                ];
            },
        ],
    ],
    'jwt' => [
        'class' => TokenGuard::class,
        'constructor' => [
            'userProvider' => [
                'class' => JwtUserProvider::class,
                'constructor' => [
                    'jwtClient' => 'default',
                ],
            ],
            'parseCredentials' => function (ServerRequestInterface $request) {
                $jwt = $request->getHeaderLine('authorization');

                if (empty($jwt)) {
                    $queries = $request->getQueryParams();
                    $jwt = $queries['jwt'] ?? '';
                }

                return ['authorization' => $jwt];
            },
        ],
    ],
];

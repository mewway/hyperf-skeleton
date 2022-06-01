#!/usr/bin/env php
<?php

ini_set('display_errors', 'on');
ini_set('display_startup_errors', 'on');
ini_set('memory_limit', '1G');

error_reporting(E_ALL);
date_default_timezone_set('Asia/Shanghai');

! defined('BASE_PATH') && define('BASE_PATH', dirname(__DIR__, 1));
$hook = version_compare(swoole_version(), '4.6.0') >= 0 ? SWOOLE_HOOK_ALL ^ SWOOLE_HOOK_SOCKETS : SWOOLE_HOOK_ALL;
! defined('SWOOLE_HOOK_FLAGS') && define('SWOOLE_HOOK_FLAGS', $hook);

require BASE_PATH . '/vendor/autoload.php';

// Self-called anonymous function that creates its own scope and keep the global namespace clean.
(function (): void {
    Hyperf\Di\ClassLoader::init();

    /** @var Psr\Container\ContainerInterface $container */
    $container = require BASE_PATH . '/config/container.php';

    $application = $container->get(Hyperf\Contract\ApplicationInterface::class);
    $application->run();
})();
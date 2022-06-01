<?php

declare(strict_types=1);

/**
 * This file is part of HuanLeGuang Project, Created by php-cs-fixer 3.0.
 */

use Hyperf\HttpServer\Router\Router;

Router::addRoute(['GET', 'POST', 'HEAD'], '/', 'App\Controller\IndexController@index');
Router::addRoute(['GET', 'POST', 'HEAD'], '/index', 'App\Controller\IndexController@index1');
Router::addRoute(['GET', 'POST', 'HEAD'], '/index1', 'App\Controller\IndexController@index1');
Router::addRoute(['GET', 'POST', 'HEAD'], '/test', function () {
    $a = 5;
    $b = 6;
    return $a + $b;
});

Router::get('/favicon.ico', function () {
    return '';
});

Router::get('/metrics', function () {
    $registry = Hyperf\Utils\ApplicationContext::getContainer()->get(Prometheus\CollectorRegistry::class);
    $renderer = new Prometheus\RenderTextFormat();

    return $renderer->render($registry->getMetricFamilySamples());
});

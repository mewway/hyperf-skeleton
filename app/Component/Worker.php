<?php

declare(strict_types=1);

namespace App\Component;

use Hyperf\Utils\Exception\ParallelExecutionException;
use Hyperf\Utils\Parallel;
use function defer;
use function go;

/**
 * 协程辅助类.
 */
class Worker
{
    public static function run(callable $func, int $limit = 0)
    {
        $parallel = new Parallel($limit);
        $through = ContextThrough::getThrough();
        $parallel->add(function () use ($func, $through) {
            foreach ($through as $key => $value) {
                ContextThrough::through($key, $value);
            }
            $func();
        });
        try {
            $res = $parallel->wait();
        } catch (ParallelExecutionException $e) {
            $res = $e->getResults();
            error($e, 'Worker Run Exception');
        }
        return $res;
    }

    /**
     * @return bool|int
     */
    public static function go(callable $callable)
    {
        $through = ContextThrough::getThrough();
        return go(function () use ($callable, $through) {
            ContextThrough::setThrough($through);
            return $callable();
        });
    }

    /**
     * @return bool|int
     */
    public static function co(callable $callable)
    {
        return self::go($callable);
    }

    public static function defer(callable $callable): void
    {
        $through = ContextThrough::getThrough();
        defer(function () use ($callable, $through) {
            ContextThrough::setThrough($through);
            return $callable();
        });
    }
}

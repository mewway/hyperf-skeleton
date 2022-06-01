<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace App\Controller;

use App\Component\ContextThrough;
use App\Component\Worker;
use App\Exception\AppServiceException;
use Huanhyperf\Logger\Manager;
use Hyperf\Engine\Coroutine;
use Hyperf\HttpServer\Contract\ResponseInterface;

class IndexController extends AbstractController
{
    public function index()
    {
        Worker::go(function () {
            warning(ContextThrough::get('trace_id'));
            Worker::go(function () {
                warning(ContextThrough::get('trace_id'));
                Worker::go(function () {
                    warning(ContextThrough::get('trace_id'));
                });
            });
        });
        $a = 1;
        $b = 2;
        $c = 3;
        $func = function () use ($a, $b, $c) {
            Worker::run(function() {
                info(['trace_id' => ContextThrough::get('trace_id')]);
                Worker::run(function() {
                    info(['trace_id' => ContextThrough::get('trace_id')]);
                    Worker::run(function() {
                        info(['trace_id' => ContextThrough::get('trace_id')]);
                    });
                });
            });
            warning([
                'a' => $a,
                'b' => $b,
                'c' => $c,
                'trace_id' => ContextThrough::get('trace_id'),
            ]);
        };
        Worker::run($func);
    }
}

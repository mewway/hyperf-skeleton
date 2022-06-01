<?php

declare(strict_types=1);

namespace App\Job;


use App\Component\Worker;
use App\Service\TestService;
use Hyperf\Context\Context;

class TestJob extends AbstractJob
{
    protected $payload;

    public function __construct($a = 1, $b = 2, $c = 3)
    {
        $this->payload = compact('a', 'b', 'c');
    }

    public function execute()
    {
        $payload = $this->payload;
        Worker::run(function () use ($payload) {
            info($payload);
            warning(Context::get('trace_id'));
            warning(Context::get('org_id'));
            warning(Context::get('org_code'));
            Worker::run(function () {
                error(Context::get('trace_id'));
                error(Context::get('org_id'));
                error(Context::get('org_code'));
            });
        });
    }
}

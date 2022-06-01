<?php

namespace HyperfTest\Job;

use App\Component\ContextThrough;
use App\Job\TestJob;
use Hyperf\Snowflake\IdGeneratorInterface;
use PHPUnit\Framework\TestCase;

class TestJobTest extends TestCase
{
    public function testDispatch()
    {
        ContextThrough::through('org_id', 12345);
        ContextThrough::through('org_code', 'abstract');
        ContextThrough::through('trace_id', uniqid());
        $job = new TestJob();
        $result = $job->dispatch();
        $this->assertTrue($result);
    }

    public function testDispatchWithException()
    {
        $job = new TestJob();
        $job->dispatch(0, 'aaa');
    }
}

<?php

declare(strict_types=1);

namespace App\Job;

use App\Component\ContextThrough;
use App\Constants\AppCode;
use App\Exception\BusinessException;
use Hyperf\AsyncQueue\Driver\DriverFactory;
use Hyperf\AsyncQueue\Driver\DriverInterface;
use Hyperf\AsyncQueue\Job;

abstract class AbstractJob extends Job
{
    /**
     * @var null|string
     */
    protected $bindQueue;

    /**
     * @var null|int
     */
    protected $delay;

    protected $context = [];

    public function queue(string $queue): self
    {
        $this->bindQueue = $queue;
        return $this;
    }

    public function delay(int $delay): self
    {
        $this->delay = $delay;
        return $this;
    }

    public function maxAttempts(int $max): self
    {
        $this->maxAttempts = $max;
        return $this;
    }

    public function dispatch(?int $delay = null, ?string $queue = null, ?int $max = null): bool
    {
        $this->context = ContextThrough::getThrough();
        ! is_null($max) && $this->maxAttempts = $max;
        $driver = $this->getQueueDriver($queue ?? $this->bindQueue);
        return $driver->push($this, $delay ?? $this->delay ?? 0);
    }

    public function handle()
    {
        ContextThrough::setThrough($this->context);
        try {
            $startTime = microtime(true);
            $this->execute();
            $endTime = microtime(true);
            $duration = ($endTime - $startTime);
        } catch (\Throwable $t) {

        }
    }

    abstract public function execute();

    private function getQueueConfig(?string &$queueName = null): array
    {
        $queueName = $queueName ?? 'default';
        $config = config('async_queue.' . $queueName, []);
        if (empty($config) || ! isset($config['channel'])) {
            throw new BusinessException(AppCode::SYS_DEFAULT_ERROR, sprintf('queue %s or its channel not exists', $queueName));
        }
        return $config;
    }

    private function getQueueDriver(?string $queueName = null): DriverInterface
    {
        $this->getQueueConfig($queueName);
        return make(DriverFactory::class)->get($queueName);
    }
}

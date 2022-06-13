<?php

declare(strict_types=1);

namespace App\Event;

use Psr\EventDispatcher\EventDispatcherInterface;

/**
 * @method  static dispatch():self
 */
abstract class AbstractEvent
{
    public function __call(string $name, array $params)
    {
        if ($name === 'dispatch') {
            return $this->getEventDispatcher()->dispatch($this);
        }
    }

    public static function __callStatic(string $name, array $params)
    {
        if ($name === 'dispatch') {
            $self = new static(...$params);
            $self->dispatch();
        }
    }

    private function getEventDispatcher()
    {
        return make(EventDispatcherInterface::class);
    }
}

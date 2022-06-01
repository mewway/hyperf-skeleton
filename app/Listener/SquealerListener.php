<?php

declare(strict_types=1);

namespace App\Listener;

use App\Component\ModelSquealer\SquealerInterface;
use Hyperf\Database\Model\Events\Created;
use Hyperf\Database\Model\Events\Deleted;
use Hyperf\Database\Model\Events\Deleting;
use Hyperf\Database\Model\Events\ForceDeleted;
use Hyperf\Database\Model\Events\Restored;
use Hyperf\Database\Model\Events\Restoring;
use Hyperf\Database\Model\Events\Saved;
use Hyperf\Database\Model\Events\Saving;
use Hyperf\Database\Model\Events\Updated;
use Hyperf\Database\Model\Events\Updating;
use Hyperf\Event\Annotation\Listener;
use Hyperf\Event\Contract\ListenerInterface;
use Hyperf\Logger\LoggerFactory;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;

/**
 * @Listener
 */
#[Listener]
class SquealerListener implements ListenerInterface
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(ContainerInterface $container)
    {
        $this->logger = $container->get(LoggerFactory::class)->get('squealer');
    }

    public function listen(): array
    {
        return [
            Created::class,
            Updating::class,
            Updated::class,
            Saving::class,
            Saved::class,
            Deleting::class,
            Deleted::class,
            ForceDeleted::class,
            Restoring::class,
            Restored::class,
        ];
    }

    /**
     * @param Created|Deleted|Deleting|ForceDeleted|object|Restored|Restoring|Saved|Saving|Updated|Updating $event
     */
    public function process(object $event)
    {
        $model = $event->getModel();
        if (! $model instanceof SquealerInterface) {
            $this->logger->debug(get_class($model) . ' Didn\'t Implement SquealerInterface, Skipped');
            return;
        }
    }
}

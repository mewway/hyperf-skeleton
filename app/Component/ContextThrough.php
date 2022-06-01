<?php

declare(strict_types=1);

namespace App\Component;

use Hyperf\Context\Context as BaseContext;

class ContextThrough extends BaseContext
{
    const THROUGH_KEY = 'context:through:keys';

    /**
     * 穿透配置协程上下文， 子协程中可以获取穿透配置的上下文.
     * @param string $id
     * @param $value
     * @return void
     */
    public static function through(string $id, $value)
    {
        $through = self::getThrough() ?? [];
        $through[$id] = $value;
        parent::set(static::THROUGH_KEY, $through);
        parent::set($id, $value);
    }

    /**
     * 获取当前协程下所有穿透上下文配置
     * @return array|mixed
     */
    public static function getThrough()
    {
        return parent::get(static::THROUGH_KEY) ?? [];
    }

    /**
     * 批量配置穿透上下文
     * @param array $through
     * @return void
     */
    public static function setThrough(array $through): void
    {
        foreach ($through as $key => $value) {
            self::through($key, $value);
        }
    }
}

<?php

declare(strict_types=1);

namespace App\Component;

use App\Constants\Redis;
use Hyperf\Cache\Cache;
use Hyperf\Di\Annotation\Inject;

/**
 * 自增加id生成器.
 */
class IncreaseCodeGenerator
{
    const LIFE_CYCLE_YEAR = 'year';

    const LIFE_CYCLE_MONTH = 'month';

    const LIFE_CYCLE_DAY = 'day';

    const LIFE_CYCLE_HOUR = 'hour';

    const LIFE_CYCLE_MINUTE = 'minute';

    /**
     * @Inject
     * @var Cache
     */
    protected $cache;

    protected $dataLength = 5;

    public function setDataLength(int $dataLen): self
    {
        $this->dataLength = $dataLen;
        return $this;
    }

    public function generate(string $prefix = '', string $suffix = '', string $lifeCycle = self::LIFE_CYCLE_DAY)
    {
        $key = Redis::KEY_AUTO_INCREMENT_CODE . $lifeCycle . ':' . ($prefix ?: 'default');
        [$base, $expiredTime] = $this->getBasePrefix($lifeCycle);

        if ($this->cache->has($key)) {
            $value = $this->cache->get($key);
            ++$value;
        } else {
            $value = 1;

        }
        $this->cache->set($key, $value, $expiredTime);
        return strtoupper($prefix) . $base . sprintf("%0{$this->dataLength}s", $value) . strtoupper($suffix);
    }

    private function getBasePrefix(string $lifeCycle): array
    {
        switch ($lifeCycle) {
            case self::LIFE_CYCLE_YEAR:
                $base = date('Y');
                $expiredTime = strtotime(date('Y-12-31 23:59:59')) - time();
                break;
            case self::LIFE_CYCLE_MONTH:
                $base = date('Ym');
                $expiredTime = strtotime('last day of this month 23:59:59') - time();
                break;
            case self::LIFE_CYCLE_DAY:
            default:
                $base = date('Ymd');
                $expiredTime = strtotime('tomorrow') - time();
                break;
            case self::LIFE_CYCLE_HOUR:
                $base = date('YmdH');
                $expiredTime = strtotime(date('Y-m-d H:59:59')) - time();
                break;
            case self::LIFE_CYCLE_MINUTE:
                $base = date('YmdHi');
                $expiredTime = strtotime(date('Y-m-d H:i:59')) - time();
                break;
        }
        return [$base, $expiredTime];
    }
}

<?php

declare(strict_types=1);

namespace App\RpcService\Provider;

use Hyperf\RpcServer\Annotation\RpcService;

/**
 * @RpcService(name="TestRpcService", protocol="jsonrpc", server="jsonrpc")
 */
class TestRpcService
{
    public function add(int $a, int $b): int
    {
        return $a + $b;
    }
}

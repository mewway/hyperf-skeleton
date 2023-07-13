<?php

declare(strict_types=1);

namespace App\RpcService\Consumer\Shop1\Shop2\Shop3;

use Hyperf\RpcClient\AbstractServiceClient;

/**
 * @RpcService(name="ShopProvider", protocol="jsonrpc", server="jsonrpc")
 */
class ShopProvider extends AbstractServiceClient
{

}

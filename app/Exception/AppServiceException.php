<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace App\Exception;

use App\Constants\ErrorCode;
use Hyperf\Server\Exception\ServerException;
use Throwable;

class AppServiceException extends ServerException
{
    protected $httpCode;

    public function __construct(int $code = 0, string $message = null, int $httpCode = 200, Throwable $previous = null)
    {
        $this->httpCode = $httpCode;
        $msg = ErrorCode::getMessage($code);
        $message = $message ?: $msg;

        parent::__construct($message, $code, $previous);
    }

    public function getHttpCode(): int
    {
        return $this->httpCode;
    }
}

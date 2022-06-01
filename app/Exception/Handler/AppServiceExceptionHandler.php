<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace App\Exception\Handler;

use App\Exception\AppServiceException;
use Huanhyperf\Logger\Manager;
use Hyperf\Contract\StdoutLoggerInterface;
use Hyperf\ExceptionHandler\ExceptionHandler;
use Hyperf\HttpMessage\Stream\SwooleStream;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class AppServiceExceptionHandler extends ExceptionHandler
{
    /**
     * @var StdoutLoggerInterface
     */
    protected $logger;

    public function __construct(StdoutLoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param Throwable|AppServiceException $throwable
     * @param ResponseInterface $response
     * @return ResponseInterface
     */
    public function handle(Throwable $throwable, ResponseInterface $response)
    {
        $traceId = $response->getHeader('trace_id')[0] ?? '';
        $body = [
            'code' => $throwable->getCode(),
            'message' => $throwable->getMessage() . sprintf(' rid(%s)', $traceId),
        ];
        $error = sprintf('%s in %s:%s', $throwable->getMessage(), $throwable->getFile(), $throwable->getLine());

        if (config('app.app_debug')) {
            $body['message'] = $error . sprintf(' rid(%s)', $traceId);
            $body['traces'] = $throwable->getTrace();
        }

        $this->stopPropagation();
        $resp = json_encode($body, JSON_UNESCAPED_UNICODE);
        return $response->withHeader('Content-Type', 'application/json')
            ->withStatus($throwable->getHttpCode())
            ->withBody(new SwooleStream($resp));
    }

    public function isValid(Throwable $throwable): bool
    {
        return $throwable instanceof AppServiceException;
    }
}

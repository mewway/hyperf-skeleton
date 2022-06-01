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
namespace App\Component;

use App\Constants\App;
use App\Constants\AppCode;
use App\Exception\AppServiceException;
use Hyperf\Contract\LengthAwarePaginatorInterface;
use Hyperf\HttpMessage\Stream\SwooleStream;
use Hyperf\HttpServer\Exception\Http\EncodingException;
use Hyperf\HttpServer\Response as HyperfResponse;
use Hyperf\Paginator\AbstractPaginator;
use Hyperf\Utils\Codec\Json;
use Psr\Http\Message\ResponseInterface as PsrResponseInterface;

class Response extends HyperfResponse
{
    /**
     * @param null $data
     * @param string $message
     * @param int $code
     * @return PsrResponseInterface
     */
    public function success($data = null, string $message = App::DEFAULT_SUCCESS_MESSAGE, int $code = App::DEFAULT_SUCCESS_CODE)
    {
        $response = [
            App::RESP_CODE => $code,
            App::RESP_MESSAGE => $message,
        ];

        if ($data instanceof LengthAwarePaginatorInterface || $data instanceof AbstractPaginator) {
            $data = $data->toArray();
        } else {
            $data = ['data' => $data === NULL ? new \stdClass() : $data];
        }

        return $this->json(array_merge($response, $data));
    }

    public function redirectTo(string $toUrl, $openNewPage = false)
    {
        $data = [
            'url' => $toUrl,
            'target' => $openNewPage ? '_blank' : '_self',
        ];
        return $this->success($data, 'Open New Page', AppCode::CON_OPEN_NEW_PAGE);
    }

    /**
     * @param int $code
     * @param int $httpCode
     * @return mixed
     */
    public function error(int $code = AppCode::SYS_DEFAULT_ERROR, ?string $message = null, int $httpCode = 400)
    {
        throw new AppServiceException($code, $message, $httpCode);
    }

    /**
     * @param array|\Hyperf\Utils\Contracts\Arrayable|\Hyperf\Utils\Contracts\Jsonable $result
     * @param int $statusCode
     * @param int $options
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function json($result, int $statusCode = 200, $options = JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) : PsrResponseInterface
    {
        $data = $this->toJson($result);

        return $this->getResponse()
            ->withStatus($statusCode)
            ->withAddedHeader('content-type', 'application/json; charset=utf-8')
            ->withBody(new SwooleStream($data));
    }

    /**
     * @param array|\Hyperf\Utils\Contracts\Arrayable|\Hyperf\Utils\Contracts\Jsonable $data
     * @param int $options
     * @return string
     */
    protected function toJson($data, $options = JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) : string
    {
        try {
            $result = Json::encode($data, $options);
        } catch (\Throwable $exception) {
            throw new EncodingException($exception->getMessage(), $exception->getCode());
        }

        return $result;
    }
}

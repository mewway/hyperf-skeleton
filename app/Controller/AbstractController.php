<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace App\Controller;

use App\Component\Response;
use App\Constants\App;
use App\Constants\AppCode;
use App\Exception\ValidationException;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Contract\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Hyperf\Validation\Contract\ValidatorFactoryInterface;
use Psr\Container\ContainerInterface;

abstract class AbstractController
{
    /**
     * @Inject
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @Inject
     * @var RequestInterface
     */
    protected $request;

    /**
     * @Inject
     * @var Response
     */
    protected $response;

    /**
     * @var ValidatorFactoryInterface
     */
    protected $validator;

    public function validate(array $data, array $rules = [], array $messages = [], bool $onlyReturnValidated = true)
    {
        $validator = $this->validator->make($data, $rules, $messages);
        if ($validator->fails()) {
            throw new ValidationException(AppCode::VAL_ILLEGAL, $validator->errors()->first());
        }
        if ($onlyReturnValidated === true) {
            return $validator->getData();
        }
        return $data;
    }

    /**
     * @param $data
     * @param int $code
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function response($data, string $message = App::DEFAULT_SUCCESS_MESSAGE, int $code = App::DEFAULT_SUCCESS_CODE): ResponseInterface
    {
        return $this->response->success($data, $message, $code);
    }
}

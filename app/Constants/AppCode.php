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
namespace App\Constants;

use Hyperf\Constants\AbstractConstants;
use Hyperf\Constants\Annotation\Constants;

/**
 * 响应码的具体意义 **应该** 如下：
 * 第一位：标识错误的来源 标识业务场景
 * 第二位：标识错误的等级及致命程度 0-9 致命程度递增
 * 第三位：同第四位 错误的随机码
 * 第四位：同第三位 错误的随机码
 *
 * 第一位错误标识的定义 **应该** 如下:
 * AUTH（authorization 授权、权限、权益相关）对应响应码开头为：1
 * VAL（validation 值验证, 表单验证） 对应响应码开头为：2
 * SYS（system 系统内部, 逻辑处理异常的错误类型）对应响应码开头为：3
 * NET（http 网络请求, 白名单、限流相关的错误类型）对应响应码开头为：4
 * CUS  (custom 自定义的错误类型) 对应响应码开头为 5
 * IDS（inner dependency service 内部服务调用报错, 如rpc、跨模块、应用间调用报错）对应响应码开头为：6
 * THR（third party 依赖第三方, 除去企业内部模块或应用的依赖第三方的请求错误）对应响应码开头为：7
 * DB（database 数据库执行的错误码）对应响应码开头为：8
 * CON (contract缩写 和前端的契约响应码  前端会根据此类响应码做特殊交互) 对应开头 9
 * @Constants
 * @method getMessage($code)
 */
class AppCode extends AbstractConstants
{
    /**
     * @Message("非法或越权操作")
     */
    const AUTH_REJECT = 1401;

    /**
     * @Message("权限不足")
     */
    const AUTH_PERMISSION_DENIED = 1401;

    /**
     * @Message("未登录")
     */
    const AUTH_NOT_LOGIN = 1406;

    /**
     * @Message("授权信息无效")
     */
    const AUTH_INVALID = 1501;

    /**
     * @Message("授权过期")
     */
    const AUTH_EXPIRED = 1601;

    /**
     * @Message("参数不符合要求")
     */
    const VAL_ILLEGAL = 2101;

    /**
     * @Message("参数长度不符合要求")
     */
    const VAL_INVALID_LENGTH = 2201;

    /**
     * @Message("名称无效")
     */
    const VAL_INVALID_NAME = 2202;

    /**
     * @Message("格式无效")
     */
    const VAL_INVALID_FORMAT = 2201;

    /**
     * @Message("Error")
     */
    const SYS_DEFAULT_ERROR = 3101;

    /**
     * @Message("暂不支持")
     */
    const SYS_NOT_SUPPORT = 3201;

    /**
     * @Message("重复的请求")
     */
    const SYS_DUPLICATED_REQUEST = 3301;

    /**
     * @Message("重复的数据")
     */
    const SYS_DUPLICATED_DATA = 3501;

    /**
     * @Message("数据为空或不存在")
     */
    const SYS_DATA_NOT_EXISTS = 3521;

    /**
     * @Message("资源不存在")
     */
    const SYS_RESOURCE_NOT_EXISTS = 3522;

    /**
     * @Message("系统内部异常")
     */
    const SYS_INTERNAL_ERROR = 3523;

    /**
     * @Message("非法操作")
     */
    const SYS_ILLEGAL_OPERATION = 3533;

    /**
     * @Message("无效操作")
     */
    const SYS_INVALID_OPERATION = 3543;

    /**
     * @Message("超出限制")
     */
    const SYS_OUT_OF_LIMITATION = 3553;

    /**
     * @Message("超出并发限制")
     */
    const NET_THROTTLE_LIMITED = 4301;

    /**
     * @Message("请求异常 不在请求白名单内")
     */
    const NET_NOT_IN_WHITE_LIST = 4311;

    /**
     * @Message("下载失败")
     */
    const NET_DOWNLOAD_FAILED = 4321;

    /**
     * @Message("连接超时")
     */
    const NET_CONNECTION_TIMEOUT = 4331;

    /**
     * @Message("请求超时")
     */
    const NET_REQUEST_TIMEOUT = 4341;

    /**
     *  @Message("依赖服务异常")
     */
    const IDS_DEFAULT_ERROR = 6501;

    /**
     *  @Message("第三方服务异常")
     */
    const THR_DEFAULT_ERROR = 7501;

    /**
     *  @Message("数据库服务异常")
     */
    const DB_DEFAULT_ERROR = 8801;

    /**
     *  @Message("OPEN NEW PAGE")
     */
    const CON_OPEN_NEW_PAGE = 9002;

    /**
     *  @Message("FORCE_LOGOUT")
     */
    const CON_FORCE_LOGOUT = 9003;
}


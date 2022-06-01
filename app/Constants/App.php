<?php

namespace App\Constants;

/**
 * Class App
 * @package App\Constants
 */
class App
{
    const TRUE = 1;
    const FALSE = 0;
    const DATE_FORMAT = 'Y-m-d H:i:s';

    // 返回值字段定义.
    const RESP_CODE = 'code';
    const RESP_MESSAGE = 'message';
    const RESP_DATA = 'data';
    const RESP_PAGE = 'page';
    const RESP_PAGE_SIZE = 'page_size';
    const RESP_TOTAL_ITEMS = 'total_items';
    const RESP_TOTAL_PAGES = 'total';

    const DEFAULT_SUCCESS_CODE = 0;
    const DEFAULT_SUCCESS_MESSAGE = 'success.';
    const DEFAULT_ERROR_MESSAGE = 'error.';
    const DEFAULT_PAGE_SIZE = 20;

    const ENV_DEV = 'dev';
    const ENV_FAT = 'fat';
    const ENV_STAGE = 'stage';
    const ENV_PROD = 'prod';
}

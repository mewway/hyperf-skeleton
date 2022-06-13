<?php

declare(strict_types=1);

namespace App\Model;

use App\Constants\App;
use Huanhyperf\Database\Model\Model as BaseModel;

/**
 * Class Model.
 */
abstract class Model extends BaseModel
{
    const TRUE = App::TRUE;

    const FALSE = App::FALSE;
}

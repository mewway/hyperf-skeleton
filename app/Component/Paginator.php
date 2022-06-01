<?php
declare(strict_types=1);

/**
 * @author: yubing
 * @time: 2021/6/1
 */
namespace App\Component;

use App\Constants\App;
use Hyperf\Paginator\LengthAwarePaginator;

class Paginator extends LengthAwarePaginator
{
    public function toArray(): array
    {
        return [
            App::RESP_TOTAL_PAGES => $this->total(),
            App::RESP_TOTAL_ITEMS => $this->lastItem(),
            App::RESP_PAGE  => $this->currentPage(),
            App::RESP_PAGE_SIZE => $this->perPage(),
            App::RESP_DATA => $this->items->toArray(),
        ];
    }
}

<?php

declare(strict_types=1);

namespace App\Services\Product;

use App\DTO\Product\FilterData;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ProductServiceContract
{

    public function list(
        FilterData $filterData,
        int $perPage = 40
    ): LengthAwarePaginator;

}
<?php

declare(strict_types=1);

namespace App\Repositories\Product;

use App\DTO\Product\FilterData;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ProductRepositoryContract
{

    public function list(
        FilterData $filterData,
        int $perPage = 40
    ): LengthAwarePaginator;

}
<?php

declare(strict_types=1);

namespace App\Repositories\Product;

use App\DTO\Product\FilterData;
use App\Filters\PropertiesFilter;
use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Pipeline\Pipeline;

final class ProductRepository implements ProductRepositoryContract
{

    public function list(
        FilterData $filterData,
        int $perPage = 40
    ): LengthAwarePaginator {
        return app(Pipeline::class)
            ->send(Product::query())
            ->through([
                new PropertiesFilter(
                    $filterData
                ),
            ])
            ->via('execute')
            ->thenReturn()
            ->with(['properties'])
            ->paginate($perPage);
    }

}
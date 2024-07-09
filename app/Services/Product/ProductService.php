<?php

declare(strict_types=1);

namespace App\Services\Product;

use App\DTO\Product\FilterData;
use App\Repositories\Product\ProductRepositoryContract;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

final class ProductService implements ProductServiceContract
{

    public function __construct(
        protected ProductRepositoryContract $productRepository
    ) {}

    public function list(
        FilterData $filterData,
        int $perPage = 40
    ): LengthAwarePaginator {
        return $this->productRepository->list($filterData, $perPage);
    }

}
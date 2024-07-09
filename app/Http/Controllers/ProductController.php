<?php

namespace App\Http\Controllers;

use App\DTO\Product\FilterData;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Services\Product\ProductServiceContract;

class ProductController extends Controller
{

    public function __construct(
        protected ProductServiceContract $productService
    ) {}

    public function index(ProductRequest $request)
    {
        return ProductResource::collection(
            $this->productService->list(
                new FilterData(
                    $request->get('properties', []),
                )
            )
        );
    }

}

<?php

namespace App\Providers;

use App\Services\Product\ProductService;
use App\Services\Product\ProductServiceContract;
use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        $this->app->singleton(
            ProductServiceContract::class,
            ProductService::class
        );
    }

}

<?php

namespace App\Product;

use App\Product\Adapters\Repositories\ProductRepository;
use App\Product\Domain\Contracts\ProductRepositoryPort;
use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ProductRepositoryPort::class, ProductRepository::class);
    }

    public function boot() {}
}

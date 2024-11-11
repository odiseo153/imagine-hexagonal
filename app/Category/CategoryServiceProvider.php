<?php

namespace App\Category;

use App\Category\Adapters\Repositories\CategoryRepository;
use App\Category\Domain\Contracts\CategoryRepositoryPort;
use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(CategoryRepositoryPort::class, CategoryRepository::class);
    }

    public function boot() {}
}

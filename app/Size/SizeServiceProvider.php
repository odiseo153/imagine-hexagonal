<?php

namespace App\Size;

use App\Size\Adapters\Repositories\SizeRepository;
use App\Size\Domain\Contracts\SizeRepositoryPort;
use Illuminate\Support\ServiceProvider;

class SizeServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(SizeRepositoryPort::class, SizeRepository::class);
    }

    public function boot() {}
}

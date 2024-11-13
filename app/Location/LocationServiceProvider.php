<?php

namespace App\Location;

use App\Location\Adapters\Repositories\LocationRepository;
use App\Location\Domain\Contracts\LocationRepositoryPort;
use Illuminate\Support\ServiceProvider;

class LocationServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(LocationRepositoryPort::class, LocationRepository::class);
    }

    public function boot() {}
}

<?php

namespace App\Petition;

use App\Petition\Adapters\Repositories\PetitionRepository;
use App\Petition\Domain\Contracts\PetitionRepositoryPort;
use Illuminate\Support\ServiceProvider;

class PetitionServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(PetitionRepositoryPort::class, PetitionRepository::class);
    }

    public function boot() {}
}

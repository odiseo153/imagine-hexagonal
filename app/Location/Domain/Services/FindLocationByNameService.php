<?php

namespace App\Location\Domain\Services;

use App\Location\Domain\Contracts\LocationRepositoryPort;
use App\Location\Domain\Entities\Location;

class FindLocationByNameService
{
    private LocationRepositoryPort $locationRepository;

    public function __construct(LocationRepositoryPort $locationRepository)
    {
        $this->locationRepository = $locationRepository;
    }

    public function execute(string $name): Location
    {
        return $this->locationRepository->findByName($name);
    }
}

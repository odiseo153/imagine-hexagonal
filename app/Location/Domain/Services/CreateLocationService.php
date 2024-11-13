<?php

namespace App\Location\Domain\Services;

use App\Location\Domain\Contracts\LocationRepositoryPort;
use App\Location\Domain\Entities\Location;

class CreateLocationService
{
    private LocationRepositoryPort $locationRepository;

    public function __construct(LocationRepositoryPort $locationRepository)
    {
        $this->locationRepository = $locationRepository;
    }

    public function execute(array $data): Location
    {
        $location = new Location($data);
        return $this->locationRepository->create($location);
    }
}

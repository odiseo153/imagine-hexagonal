<?php

namespace App\Location\Domain\Services;

use App\Location\Domain\Contracts\LocationRepositoryPort;
use App\Location\Domain\Entities\Location;

class FindLocationByIdService
{
    private LocationRepositoryPort $locationRepository;

    public function __construct(LocationRepositoryPort $locationRepository)
    {
        $this->locationRepository = $locationRepository;
    }

    public function execute(string $id): Location
    {
        return $this->locationRepository->findById($id);
    }
}

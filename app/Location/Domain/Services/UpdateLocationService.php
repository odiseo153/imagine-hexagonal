<?php

namespace App\Location\Domain\Services;

use App\Location\Domain\Contracts\LocationRepositoryPort;
use App\Location\Domain\Entities\Location;

class UpdateLocationService
{
    private LocationRepositoryPort $locationRepository;

    public function __construct(LocationRepositoryPort $locationRepository)
    {
        $this->locationRepository = $locationRepository;
    }

    public function execute(string $id, array $data): Location
    {
        return $this->locationRepository->update($id, $data);
    }
}

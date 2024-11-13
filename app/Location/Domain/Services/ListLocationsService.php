<?php

namespace App\Location\Domain\Services;

use App\Location\Domain\Contracts\LocationRepositoryPort;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ListLocationsService
{
    private LocationRepositoryPort $locationRepository;

    public function __construct(LocationRepositoryPort $locationRepository)
    {
        $this->locationRepository = $locationRepository;
    }

    public function execute(int $perPage): LengthAwarePaginator
    {
        return $this->locationRepository->getAll($perPage);
    }
}

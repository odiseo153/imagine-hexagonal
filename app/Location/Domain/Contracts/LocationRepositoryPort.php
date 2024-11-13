<?php

namespace App\Location\Domain\Contracts;

use App\Location\Domain\Entities\Location;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface LocationRepositoryPort
{
    public function create(Location $location): Location;
    public function getAll(int $perPage): LengthAwarePaginator;
    public function findById(string $id): Location;
    public function findByName(string $name): Location;
}

<?php

namespace App\Location\Domain\Contracts;

use App\Location\Domain\Entities\Location;

interface LocationRepositoryPort
{
    public function create(Location $location): Location;
}

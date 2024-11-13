<?php

namespace App\Petition\Domain\Contracts;

use App\Petition\Domain\Entities\Petition;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface PetitionRepositoryPort
{
    public function create(Petition $petition): Petition;
}

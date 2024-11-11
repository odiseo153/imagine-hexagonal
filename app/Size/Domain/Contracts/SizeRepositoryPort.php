<?php

namespace App\Size\Domain\Contracts;

use App\Size\Domain\Entities\Size;

interface SizeRepositoryPort
{
    public function create(Size $size): Size;
    // public function getAll(int $perPage): LengthAwarePaginator;
    // public function findById(string $id): Size;
}

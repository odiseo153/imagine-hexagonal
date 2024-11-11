<?php

namespace App\Size\Domain\Contracts;

use App\Size\Domain\Entities\Size;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface SizeRepositoryPort
{
    public function create(Size $size): Size;
    public function getAll(int $perPage): LengthAwarePaginator;
    public function findById(string $id): Size;
}

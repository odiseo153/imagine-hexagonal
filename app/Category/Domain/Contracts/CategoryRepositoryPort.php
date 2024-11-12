<?php

namespace App\Category\Domain\Contracts;

use App\Category\Domain\Entities\Category;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface CategoryRepositoryPort
{
    public function create(Category $category): Category;
    public function getAll(int $perPage): LengthAwarePaginator;
    public function findById(string $id): Category;
    public function update(string $id, array $data): Category;
    public function findByName(string $name): Category;
}

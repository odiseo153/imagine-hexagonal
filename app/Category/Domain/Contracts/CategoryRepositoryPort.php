<?php

namespace App\Category\Domain\Contracts;

use App\Category\Domain\Entities\Category;

interface CategoryRepositoryPort
{
    public function create(Category $category): Category;
    public function getAll(int $perPage);
    public function findById(string $id): Category;
    public function update(string $id, array $data): Category;
}

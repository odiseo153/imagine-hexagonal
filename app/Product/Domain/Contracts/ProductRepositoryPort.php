<?php

namespace App\Product\Domain\Contracts;

use App\Product\Domain\Entities\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ProductRepositoryPort
{
    public function create(Product $product): Product;
    public function getAll(int $perPage): LengthAwarePaginator;
    public function findById(string $id): Product;
}

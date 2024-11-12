<?php

namespace App\Product\Domain\Contracts;

use App\Product\Domain\Entities\Product;

interface ProductRepositoryPort
{
    public function create(Product $product): Product;
}

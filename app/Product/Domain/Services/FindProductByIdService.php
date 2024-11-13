<?php

namespace App\Product\Domain\Services;

use App\Product\Domain\Contracts\ProductRepositoryPort;
use App\Product\Domain\Entities\Product;

class FindProductByIdService
{
    private ProductRepositoryPort $productRepository;

    public function __construct(ProductRepositoryPort $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function execute(string $id): Product
    {
        return $this->productRepository->findById($id);
    }
}

<?php

namespace App\Product\Domain\Services;

use App\Product\Domain\Contracts\ProductRepositoryPort;
use App\Product\Domain\Entities\Product;

class UpdateProductService
{
    private ProductRepositoryPort $productRepository;

    public function __construct(ProductRepositoryPort $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function execute(string $id, array $data): Product
    {
        return $this->productRepository->update($id, $data);
    }
}

<?php

namespace App\Product\Domain\Services;

use App\Product\Domain\Contracts\ProductRepositoryPort;
use App\Product\Domain\Entities\Product;

class CreateProductService
{
    private ProductRepositoryPort $productRepository;

    public function __construct(ProductRepositoryPort $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function execute(array $data): Product
    {
        $product = new Product($data);
        return $this->productRepository->create($product);
    }
}

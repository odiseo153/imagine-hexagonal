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

    public function execute(
        string $name,
        float $costPrice,
        float $salePrice,
        float $filledWeight,
        float $emptyWeight,
        bool $canSellInvip,
        bool $canSellInGate,
        string $userId,
        string $categoryId,
        string $sizeId
    ): Product {
        $product = new Product(
            null,
            $name,
            $costPrice,
            $salePrice,
            $filledWeight,
            $emptyWeight,
            $canSellInvip,
            $canSellInGate,
            $userId,
            $categoryId,
            $sizeId,
            null,
            null
        );
        return $this->productRepository->create($product);
    }
}

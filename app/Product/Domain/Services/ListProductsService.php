<?php

namespace App\Product\Domain\Services;

use App\Product\Domain\Contracts\ProductRepositoryPort;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ListProductsService
{
    private ProductRepositoryPort $productRepository;

    public function __construct(ProductRepositoryPort $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function execute(int $perPage): LengthAwarePaginator
    {
        return $this->productRepository->getAll($perPage);
    }
}

<?php

namespace App\Product\Adapters\Repositories;

use App\Core\Repositories\BaseRepository;
use App\Product\Domain\Contracts\ProductRepositoryPort;
use App\Product\Domain\Entities\Product;
use App\Models\Product as ProductModel;

class ProductRepository extends BaseRepository implements ProductRepositoryPort
{
    public function __construct()
    {
        parent::__construct(ProductModel::class);
    }

    public function create(Product $product): Product
    {
        $productModel = ProductModel::create([
            'name' => $product->name,
            'cost_price' => $product->costPrice,
            'sale_price' => $product->salePrice,
            'filled_weight' => $product->filledWeight,
            'empty_weight' => $product->emptyWeight,
            'can_sell_in_vip' => $product->canSellInVip,
            'can_sell_in_gate' => $product->canSellInGate,
            'user_id' => $product->userId,
            'category_id' => $product->categoryId,
            'size_id' => $product->sizeId,
        ]);

        $productModel->load(['category', 'size']);

        return new Product(
            $productModel->id,
            $productModel->name,
            $productModel->cost_price,
            $productModel->sale_price,
            $productModel->filled_weight,
            $productModel->empty_weight,
            $productModel->can_sell_in_vip,
            $productModel->can_sell_in_gate,
            $productModel->user_id,
            $productModel->category_id,
            $productModel->size_id,
            $productModel->category,
            $productModel->size,
            $productModel->created_at->toDateTimeString(),
            $productModel->updated_at->toDateTimeString()
        );
    }
}

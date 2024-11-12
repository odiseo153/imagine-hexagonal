<?php

namespace App\Product\Adapters\Repositories;

use App\Core\Repositories\BaseRepository;
use App\Product\Domain\Contracts\ProductRepositoryPort;
use App\Product\Domain\Entities\Product;
use App\Models\Product as ProductModel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ProductRepository extends BaseRepository implements ProductRepositoryPort
{
    public function __construct()
    {
        parent::__construct(ProductModel::class);
    }

    public function getAll(int $perPage, array $filters = [], array $sorts = [], string $defaultSort = 'updated_at', array $with = ['category', 'size']): LengthAwarePaginator
    {
        return parent::getAll($perPage, $filters, $sorts, $defaultSort, $with);
    }

    public function create(Product $product): Product
    {
        $productModel = ProductModel::create([
            'name' => $product->name,
            'cost_price' => $product->costPrice,
            'sale_price' => $product->salePrice,
            'category_id' => $product->categoryId,
            'size_id' => $product->sizeId,
            'can_sell_in_vip' => $product->canSellInVip,
            'can_sell_in_gate' => $product->canSellInGate,
            'user_id' => $product->userId,
            'filled_weight' => $product->filledWeight,
            'empty_weight' => $product->emptyWeight,
        ]);
        $productModel->load(['category', 'size']);
        return new Product($productModel->toArray());
    }
}

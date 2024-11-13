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
        return  parent::getAll($perPage, $filters, $sorts, $defaultSort, $with);
    }

    public function create(Product $product): Product
    {
        $productModel = ProductModel::create([
            'name' => $product->name,
            'cost_price' => $product->cost_price,
            'sale_price' => $product->sale_price,
            'category_id' => $product->category_id,
            'size_id' => $product->size_id,
            'can_sell_in_vip' => $product->can_sell_in_vip,
            'can_sell_in_gate' => $product->can_sell_in_gate,
            'user_id' => $product->user_id,
            'filled_weight' => $product->filled_weight,
            'empty_weight' => $product->empty_weight,
        ]);
        $productModel->load(['category', 'size']);
        return new Product($productModel->toArray());
    }

    public function findById(string $id): Product
    {
        $productModel = ProductModel::with(['category', 'size'])->findOrFail($id);
        return new Product($productModel->toArray());
    }
}

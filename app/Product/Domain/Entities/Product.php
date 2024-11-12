<?php

namespace App\Product\Domain\Entities;

class Product
{
    public $id;
    public $name;
    public $costPrice;
    public $salePrice;
    public $filledWeight;
    public $emptyWeight;
    public $canSellInVip;
    public $canSellInGate;
    public $userId;
    public $categoryId;
    public $sizeId;
    public $category;
    public $size;
    public $createdAt;
    public $updatedAt;

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? null;
        $this->name = $data['name'];
        $this->costPrice = $data['cost_price'];
        $this->salePrice = $data['sale_price'];
        $this->filledWeight = $data['filled_weight'];
        $this->emptyWeight = $data['empty_weight'];
        $this->canSellInVip = $data['can_sell_in_vip'];
        $this->canSellInGate = $data['can_sell_in_gate'];
        $this->userId = $data['user_id'];
        $this->categoryId = $data['category_id'];
        $this->sizeId = $data['size_id'];
        $this->category = $data['category'] ?? null;
        $this->size = $data['size'] ?? null;
        $this->createdAt = $data['created_at'] ?? null;
        $this->updatedAt = $data['updated_at'] ?? null;
    }
}

<?php

// app/Product/Domain/Entities/Product.php
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
    public $category; // New property for category relationship
    public $size;     // New property for size relationship
    public $createdAt;
    public $updatedAt;

    public function __construct(
        ?string $id = null,
        string $name,
        float $costPrice,
        float $salePrice,
        float $filledWeight,
        float $emptyWeight,
        bool $canSellInVip,
        bool $canSellInGate,
        string $userId,
        string $categoryId,
        string $sizeId,
        ?object $category = null,
        ?object $size = null,
        ?string $createdAt = null,
        ?string $updatedAt = null
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->costPrice = $costPrice;
        $this->salePrice = $salePrice;
        $this->filledWeight = $filledWeight;
        $this->emptyWeight = $emptyWeight;
        $this->canSellInVip = $canSellInVip;
        $this->canSellInGate = $canSellInGate;
        $this->userId = $userId;
        $this->categoryId = $categoryId;
        $this->sizeId = $sizeId;
        $this->category = $category;
        $this->size = $size;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }
}

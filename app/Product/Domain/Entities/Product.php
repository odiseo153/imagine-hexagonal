<?php

namespace App\Product\Domain\Entities;

class Product
{
    public $id;
    public $name;
    public $cost_price;
    public $sale_price;
    public $filled_weight;
    public $empty_weight;
    public $can_sell_in_vip;
    public $can_sell_in_gate;
    public $user_id;
    public $category_id;
    public $size_id;
    public $created_at;
    public $updated_at;
    public $category;
    public $size;

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? null;
        $this->name = $data['name'];
        $this->cost_price = $data['cost_price'];
        $this->sale_price = $data['sale_price'];
        $this->filled_weight = $data['filled_weight'];
        $this->empty_weight = $data['empty_weight'];
        $this->can_sell_in_vip = $data['can_sell_in_vip'];
        $this->can_sell_in_gate = $data['can_sell_in_gate'];
        $this->user_id = $data['user_id'];
        $this->category_id = $data['category_id'];
        $this->size_id = $data['size_id'];
        $this->created_at = $data['created_at'] ?? null;
        $this->updated_at = $data['updated_at'] ?? null;
        $this->category = $data['category'] ?? null;
        $this->size = $data['size'] ?? null;
    }
}

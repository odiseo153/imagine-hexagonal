<?php

namespace App\Models;

class Product extends BaseModel
{
    protected $fillable = [
        'name',
        'cost_price',
        'sale_price',
        'filled_weight',
        'empty_weight',
        'can_sell_in_vip',
        'can_sell_in_gate',
        'size_id',
        'category_id',
        'user_id',
    ];

    protected $casts = [
        'can_sell_in_vip' => 'boolean',
        'can_sell_in_gate' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

    public function getFormattedName()
    {
        return ucfirst($this->name . ' (' . $this->size->name . ')');
    }
}

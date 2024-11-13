<?php

namespace App\Models;


class Inventory extends BaseModel
{
    protected $fillable = [
        'product_id',
        'location_id',
        'minimum_stock'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}

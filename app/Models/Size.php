<?php

namespace App\Models;


class Size extends BaseModel
{

    protected $fillable = [
        'name',
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = trim(strtolower($value));
    }

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
}

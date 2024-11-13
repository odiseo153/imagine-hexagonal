<?php

namespace App\Models;


class Location extends BaseModel
{
    protected $fillable = ['name', 'type', 'user_in_charge_id', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function userInCharge()
    {
        return $this->belongsTo(User::class, 'user_in_charge_id');
    }
}

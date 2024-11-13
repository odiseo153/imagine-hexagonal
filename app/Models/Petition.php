<?php

namespace App\Models;


class Petition extends BaseModel
{
    protected $fillable = [
        'note',
        'user_id',
        'from_location_id',
        'to_location_id',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

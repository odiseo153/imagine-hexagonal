<?php

namespace App\Location\Domain\Entities;

class Location
{

    public $id;
    public $name;
    public $type;
    public $user_id;
    public $user_in_charge_id;
    public $user;
    public $userInCharge;
    public $created_at;
    public $updated_at;

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? null;
        $this->name = $data['name'];
        $this->type = $data['type'];
        $this->user_id = $data['user_id'];
        $this->user_in_charge_id = $data['user_in_charge_id'];
        $this->user = $data['user'] ?? null;
        $this->userInCharge = $data['userInCharge'] ?? null;
        $this->created_at = $data['created_at'] ?? null;
        $this->updated_at = $data['updated_at'] ?? null;
    }
}

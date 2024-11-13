<?php

namespace App\Petition\Domain\Entities;

class Petition
{
    public $id;
    public $note;
    public $user_id;
    public $from_location_id;
    public $to_location_id;
    public $status;
    public $created_at;
    public $updated_at;

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? null;
        $this->note = $data['note'] ?? null;
        $this->user_id = $data['user_id'];
        $this->from_location_id = $data['from_location_id'];
        $this->to_location_id = $data['to_location_id'];
        $this->status = $data['status'] ?? 'pendiente';
        $this->created_at = $data['created_at'] ?? null;
        $this->updated_at = $data['updated_at'] ?? null;
    }
}

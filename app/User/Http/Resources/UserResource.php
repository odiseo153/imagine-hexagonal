<?php

namespace App\User\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'name' => $this->name,
            'username' => $this->username,
            'role' => $this->role
        ];
    }
}

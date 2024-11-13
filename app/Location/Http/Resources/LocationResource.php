<?php

namespace App\Location\Http\Resources;

use App\User\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class LocationResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'type' => 'categories',
            'id' => $this->id,
            'attributes' => [
                'name' => $this->name,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ],

            'relationships' => (object)[
                'user' => new UserResource((object) $this->user),
                'userInCharge' =>  new UserResource((object) $this->userInCharge),
            ],
        ];
    }
}

<?php

namespace App\Size\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SizeResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'type' => 'sizes',
            'id' => $this->id,
            'attributes' => [
                'name' => $this->name,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ],
        ];
    }
}

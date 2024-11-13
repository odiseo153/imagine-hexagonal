<?php

namespace App\Petition\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PetitionResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'type' => 'petitions',
            'id' => $this->id,
            'attributes' => [
                'status' => $this->status,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ],

            'relationships' => (object)[],
        ];
    }
}

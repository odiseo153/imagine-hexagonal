<?php

namespace App\Product\Http\Resources;

use App\Category\Http\Resources\CategoryResource;
use App\Size\Http\Resources\SizeResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Number;


class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'products',
            'id' => $this->id,
            'attributes' => [
                'name' => $this->name,
                'salePrice' => Number::currency($this->sale_price, in: 'USD', locale: 'en_US'),
                'costPrice' => Number::currency($this->cost_price, in: 'DOP', locale: 'es_DO'),
                'createdAt' => $this->created_at,
                'updatedAt' => $this->updated_at,
                'filledWeight' => $this->filled_weight,
                'emptyWeight' => $this->empty_weight,
                'canSellInGate' => $this->can_sell_in_gate,
                'canSellInVip' => $this->can_sell_in_vip,
            ],

            'links' => [
                'self' => route('products.show', ['product' => $this->id]),
            ],

            'relationships' => (object)[
                'category' => new CategoryResource((object) $this->category),
                'size' =>  new SizeResource((object) $this->size),
            ],
        ];
    }
}

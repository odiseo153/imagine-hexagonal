<?php

namespace App\Product\Http\Resources;

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
                'salePrice' => Number::currency($this->salePrice, in: 'USD', locale: 'en_US'),
                'costPrice' => Number::currency($this->costPrice, in: 'DOP', locale: 'es_DO'),
                'createdAt' => $this->createdAt,
                'updatedAt' => $this->updatedAt,
                'filledWeight' => $this->filledWeight,
                'emptyWeight' => $this->emptyWeight,
                'canSellInGate' => $this->canSellInGate,
                'canSellInVip' => $this->canSellInVip,
            ],

            'links' => [
                'self' => route('products.show', ['product' => $this->id]),
            ],

            'relationships' => (object)[
                'category' => [
                    'data' => [
                        'type' => 'categories',
                        'id' => $this->categoryId,
                        'name' => $this->category->name,
                    ],
                    'links' => [
                        'self' => route('categories.show', ['category' => $this->categoryId])
                    ],
                ],
                'size' => [
                    'data' => [
                        'type' => 'sizes',
                        'id' => $this->sizeId,
                        'name' => $this->size->name,
                    ],
                    'links' => [
                        'self' => route('sizes.show', ['size' => $this->sizeId])
                    ]
                ]

            ],
        ];
    }
}

<?php

namespace App\Product\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'salePrice' => 'required|numeric|min:0',
            'costPrice' => 'required|numeric|min:0',
            'filledWeight' => 'required|numeric|min:0',
            'emptyWeight' => 'required|numeric|min:0',
            'sizeId' => 'required|exists:sizes,id',
            'categoryId' => 'required|exists:categories,id',
            'canSellInGate' => 'required|boolean',
            'canSellInVip' => 'required|boolean',
        ];
    }
}

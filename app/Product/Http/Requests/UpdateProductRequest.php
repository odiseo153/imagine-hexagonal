<?php

namespace App\Product\Http\Requests;

use App\Core\Http\Requests\BaseFormRequest;

class UpdateProductRequest extends BaseFormRequest
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
            'name' => 'string|max:255',
            'sale_price' => 'numeric|min:0',
            'cost_price' => 'numeric|min:0',
            'filled_weight' => 'numeric|min:0',
            'empty_weight' => 'numeric|min:0',
            'size_id' => 'exists:sizes,id',
            'category_id' => 'exists:categories,id',
            'can_sell_in_gate' => 'boolean',
            'can_sell_in_vip' => 'boolean',
        ];
    }
}

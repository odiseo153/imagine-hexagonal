<?php

namespace App\Product\Http\Requests;

use App\Core\Http\Requests\BaseFormRequest;

class CreateProductRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }



    public function validated($key = null, $default = null)
    {
        $validatedData = parent::validated();
        // Add user_id after validation
        $validatedData['user_id'] = $this->user()->id;

        return $validatedData;
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
            'sale_price' => 'required|numeric|min:0',
            'cost_price' => 'required|numeric|min:0',
            'filled_weight' => 'required|numeric|min:0',
            'empty_weight' => 'required|numeric|min:0',
            'size_id' => 'required|exists:sizes,id',
            'category_id' => 'required|exists:categories,id',
            'can_sell_in_gate' => 'required|boolean',
            'can_sell_in_vip' => 'required|boolean',
        ];
    }
}

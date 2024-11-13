<?php

namespace App\Petition\Http\Requests;

use App\Core\Http\Requests\BaseFormRequest;

class CreatePetitionRequest extends BaseFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function validated($key = null, $default = null)
    {
        $validatedData = parent::validated();
        $validatedData['user_id'] = $this->user()->id;

        return $validatedData;
    }

    public function rules(): array
    {
        return [
            'from_location_id' => 'required|exists:locations,id',
            'to_location_id' => 'required|exists:locations,id',
            'products' => 'required|array',
            'products.*.product_id' => 'required|string|exists:products,id|distinct',
            'products.*.quantity' => 'required|integer|min:1',
        ];
    }
}

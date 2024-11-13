<?php

namespace App\Location\Http\Requests;

use App\Core\Http\Requests\BaseFormRequest;

class CreateLocationRequest extends BaseFormRequest
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
            'name' => 'required|string|max:255|unique:locations,name',
            'type' => 'required|string|in:barra,office,puerta,general',
            'user_in_charge_id' => 'required|string|exists:users,id',
        ];
    }
}

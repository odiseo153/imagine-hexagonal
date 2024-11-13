<?php

namespace App\Location\Http\Requests;

use App\Core\Http\Requests\BaseFormRequest;

class UpdateLocationRequest extends BaseFormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'string|max:255|unique:sizes,name,' . $this->route('locations'),
            'type' => 'string|in:barra,office,puerta,general',
            'user_in_charge_id' => 'string|exists:users,id',
        ];
    }
}

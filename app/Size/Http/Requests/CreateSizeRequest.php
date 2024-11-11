<?php

namespace App\Size\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSizeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:sizes',
        ];
    }
}

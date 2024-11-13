<?php

namespace App\Category\Http\Requests;

use App\Core\Http\Requests\BaseFormRequest;

class CreateCategoryRequest extends BaseFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:categories',
        ];
    }
}

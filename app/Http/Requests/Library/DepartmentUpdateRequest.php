<?php

namespace App\Http\Requests\Library;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'code' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'is_general' => 'nullable',
            'is_lab' => 'nullable',
            'is_store' => 'nullable',
        ];
    }
}

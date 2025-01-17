<?php

namespace App\Http\Requests\Library;

use Illuminate\Foundation\Http\FormRequest;

class DesignationCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'grade_id' => 'required|exists:grades,id',
            'description' => 'nullable',
        ];
    }

    public function attributes(): array
    {
        return [
            'grade_id' => 'grade',
        ];
    }
}

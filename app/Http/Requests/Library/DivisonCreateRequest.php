<?php

namespace App\Http\Requests\Library;

use Illuminate\Foundation\Http\FormRequest;

class DivisonCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|min:2|max:50',
            'bn_name' => 'nullable|regex:/^[\p{Bengali} ]+$/u',
            'url' => 'nullable',
        ];
    }

    public function attributes(): array
    {
        return [
            'bn_name' => 'bangla name',
        ];
    }
}

<?php

namespace App\Http\Requests\Library;

use Illuminate\Foundation\Http\FormRequest;

class UnionCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'upazila_id' => 'required',
            'name' => 'required',
            'bn_name' => 'required',
            'url' => 'required',
        ];
    }

    public function attributes(): array
    {
        return [
            'upazila_id' => 'upazila',
            'bn_name' => 'bangla name',
        ];
    }
}

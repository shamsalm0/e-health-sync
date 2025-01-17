<?php

namespace App\Http\Requests\Library;

use Illuminate\Foundation\Http\FormRequest;

class UpazilaCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'district_id' => 'required',
            'name' => 'required',
            'bn_name' => 'required',
            'url' => 'required',
        ];
    }

    public function attributes(): array
    {
        return [
            'district_id' => 'district',
            'bn_name' => 'bangla name',
        ];
    }
}

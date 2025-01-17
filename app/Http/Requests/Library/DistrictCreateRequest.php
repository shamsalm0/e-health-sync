<?php

namespace App\Http\Requests\Library;

use Illuminate\Foundation\Http\FormRequest;

class DistrictCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'division_id' => 'required',
            'name' => 'required',
            'bn_name' => 'required',
            'lat' => 'required',
            'lon' => 'required',
            'url' => 'nullable',
        ];
    }

    public function attributes(): array
    {
        return [
            'division_id' => 'division',
            'bn_name' => 'bangla name',
        ];
    }
}

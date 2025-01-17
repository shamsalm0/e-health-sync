<?php

namespace App\Http\Requests\Library;

use Illuminate\Foundation\Http\FormRequest;

class HospitalCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'mobile' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'logo' => 'nullable',
            'banner' => 'nullable',
        ];
    }
}

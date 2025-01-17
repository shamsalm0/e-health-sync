<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class OtherServiceCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'service_id' => 'required',
            'price' => 'required',
            'description' => 'string',
            'doctor_status' => 'nullable',
            'nurse_status' => 'nullable',
            'word_boy_status' => 'nullable',
            'status' => 'nullable',
        ];
    }

    public function attributes(): array
    {
        return [
            'service_id' => 'service',
        ];
    }
}

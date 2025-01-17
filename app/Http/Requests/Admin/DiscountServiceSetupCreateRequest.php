<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DiscountServiceSetupCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'service_name' => 'required|string',
            'department_id' => 'required',
            'has_discount' => 'nullable',
            'has_commission' => 'nullable',
            'is_refundable' => 'nullable',
            'in_others' => 'nullable',
            'status' => 'nullable',
        ];
    }

    public function attributes(): array
    {
        return [
            'service_name' => 'service',
            'department_id' => 'department',
        ];
    }
}

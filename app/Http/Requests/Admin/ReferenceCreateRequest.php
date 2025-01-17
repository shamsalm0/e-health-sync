<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ReferenceCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'branch_id' => 'required',
            'name' => 'required|string',
            'mobile' => 'string',
            'phone' => 'string',
            'district_id' => 'required',
            'upazila_id' => 'required',
            'address' => 'string',
            'reference_type' => 'string',
            'qualification' => 'string',
            'department_id' => 'required',
            'is_surgeon' => 'nullable',
            'is_anesthesia' => 'nullable',
            'is_consultant' => 'nullable',
            'is_ultrasonogram' => 'nullable',
            'is_report_doctor' => 'nullable',
            'status' => 'required',
        ];
    }

    public function attributes(): array
    {
        return [
            'branch_id' => 'branch',
            'district_id' => 'district',
            'upazila_id' => 'upazila',
            'department_id' => 'department',
        ];
    }
}

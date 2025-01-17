<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ExternalEmpCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'branch_id' => 'required',
            'name' => 'string',
            'designation_id' => 'required',
            'department_id' => 'required',
            'emp_type_id' => 'required',
            'mobile' => 'string',
            'phone' => 'string',
            'external_type' => 'string',
            'qualification' => 'string',
            'address' => 'string',
            'remark' => 'string',
            'status' => 'required',
        ];
    }

    public function attributes(): array
    {
        return [
            'branch_id' => 'branch',
            'department_id' => 'department',
            'designation_id' => 'designation',
            'emp_type_id' => 'employee type',

        ];
    }
}

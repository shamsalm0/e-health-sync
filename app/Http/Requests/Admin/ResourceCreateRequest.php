<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ResourceCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'branch_id' => 'required',
            'resource_type' => 'string',
            'name' => 'required|string',
            'father' => 'required|string',
            'mother' => 'string',
            'dob' => 'string',
            'personal_mobile' => 'string',
            'mobile' => 'string',
            'phone' => 'string',
            'email' => 'string',
            'nid' => 'string',
            'gender_id' => 'required',
            'c_district_id' => 'required',
            'c_upazila_id' => 'required',
            'c_address' => 'string',
            'p_district_id' => 'required',
            'p_upazila_id' => 'required',
            'p_address' => 'string',
            'blood_group_id' => 'required',
            'status' => 'nullable',
        ];
    }

    public function attributes(): array
    {
        return [
            'branch_id' => 'branch',
            'dob' => 'date of birth',
            'gender_id' => 'gender',
            'c_district_id' => 'current district',
            'c_upazila_id' => 'current upazila',
            'c_address' => 'current address',
            'p_district_id' => 'permanent district',
            'p_upazila_id' => 'permanent upazila',
            'p_address' => 'permanent address',
            'blood_group_id' => 'blood group',
        ];
    }
}

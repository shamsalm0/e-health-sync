<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class ContactInfoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'division_id' => 'required',
            'district_id' => 'required',
            'upazila_id' => 'required',
            'c_post_office' => 'required',
            'c_post_code' => 'nullable',
            'c_address' => 'required',
            'c_mobile' => 'required',
            'p_division_id' => 'required_if:same_as_present,off',
            'p_district_id' => 'required_if:same_as_present,off',
            'p_upazila_id' => 'required_if:same_as_present,off',
            'p_post_office' => 'required_if:same_as_present,off',
            'p_post_code' => 'required_if:same_as_present,off',
            'p_address' => 'required_if:same_as_present,off',
            'p_mobile' => 'required_if:same_as_present,off',
            'mailing_address' => 'required',
        ];
    }

    public function attributes(): array
    {
        return [
            'division_id' => 'division',
            'district_id' => 'district',
            'upazila_id' => 'upazilla',
            'c_post_office' => 'current post office',
            'c_post_code' => 'current post code',
            'c_address' => 'current address',
            'c_mobile' => 'current mobile number',
            'p_division_id' => 'permanent division',
            'p_district_id' => 'permanent district',
            'p_upazila_id' => 'permanent upazilla',
            'p_post_office' => 'permanent post office',
            'p_post_code' => 'permanent post code',
            'p_address' => 'permanent address',
            'p_mobile' => 'permanent mobile number',
            'mailing_address' => 'mailing address',
        ];
    }
}

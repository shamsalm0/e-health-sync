<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class BasicInfoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'father' => 'required',
            'mother' => 'required',
            'dob' => 'required',
            'nid' => 'required',
            'emp_id' => 'required',
            'driving_lisence_no' => 'required',
            'qualification' => 'required',
            'job_nature' => 'required',
            'gender_id' => 'required',
            'religion_id' => 'required',
            'blood_group_id' => 'required',
            'marital_status_id' => 'required',
            'grade_id' => 'required',
            'emp_type_id' => 'required',
            'designation_id' => 'required',
            'department_id' => 'required',
            'joining_date' => 'required',
            'confirmation_date' => 'required',
            'photo' => 'required',
        ];
    }

    public function attributes(): array
    {
        return
        [
            'dob' => 'date of birth',
            'gender_id' => 'gender',
            'religion_id' => 'religion',
            'blood_group_id' => 'blood group',
            'marital_status_id' => 'marital status',
            'grade_id' => 'grade',
            'emp_id' => 'employee id',
            'driving_lisence_no' => 'driving lisence number',
            'job_nature' => 'job nature',
            'emp_type_id' => 'employee type',
            'designation_id' => 'designation',
            'department_id' => 'department',
            'joining_date' => 'joining date',
            'confirmation_date' => 'confirmation date',
        ];
    }
}

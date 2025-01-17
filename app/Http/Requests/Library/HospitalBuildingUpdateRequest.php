<?php

namespace App\Http\Requests\Library;

use Illuminate\Foundation\Http\FormRequest;

class HospitalBuildingUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'branch_id' => 'required|exists:hospital_branches,id',
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required',
        ];
    }

    public function attributes(): array
    {
        return [
            'branch_id' => 'branch',
        ];
    }
}

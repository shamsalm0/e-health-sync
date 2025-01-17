<?php

namespace App\Http\Requests\Library;

use Illuminate\Foundation\Http\FormRequest;

class HospitalFloorUpdateRequest extends FormRequest
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
            'building_id' => 'required|exists:hospital_buildings,id',
        ];
    }

    public function attributes(): array
    {
        return [
            'branch_id' => 'branch',
            'building_id' => 'building',
        ];
    }
}

<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class HospitalCounterCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'branch_id' => 'required',
            'building_id' => 'required',
            'floor_id' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'remarks' => 'required|string',
            'name' => 'required|string',
        ];
    }

    public function attributes(): array
    {
        return [
            'branch_id' => 'branch',
            'building_id' => 'building',
            'floor_id' => 'floor',
        ];
    }
}

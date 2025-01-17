<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TestMachineCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'test_name_id' => 'required',
            'machine_id' => 'required',
            'status' => 'required',
        ];
    }

    public function attributes(): array
    {
        return [
            'test_name_id' => 'test name',
            'machine_id' => 'machine',
        ];
    }
}

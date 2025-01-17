<?php

namespace App\Http\Requests\Library;

use Illuminate\Foundation\Http\FormRequest;

class ShiftCreateRequest extends FormRequest
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
            'from' => 'date_format:H:i',
            'to' => 'date_format:H:i|after:from',
        ];
    }

    public function attributes(): array
    {
        return [
            'branch_id' => 'branch',
            'from' => 'time',
            'to' => 'time',
        ];
    }
}

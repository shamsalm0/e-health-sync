<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EmpBoardCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'is_board' => 'required',
            'status' => 'required',
        ];
    }

    public function attributes(): array
    {
        return [
            'is_board' => 'board',
        ];
    }
}

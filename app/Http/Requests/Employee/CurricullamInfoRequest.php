<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class CurricullamInfoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'exam_id' => 'required',
            'board_id' => 'required',
            'year' => 'required',
            'result' => 'required',
            'out_of' => 'required',
        ];
    }

    public function attributes(): array
    {
        return [
            'exam_id' => 'exam',
            'board_id' => 'board',
            'out_of' => 'out of',
        ];
    }
}

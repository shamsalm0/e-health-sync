<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class WeekendInfoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'days' => 'required|array|min:1',
            'days.*' => 'in:saturday,sunday,monday,tuesday,wednesday,thursday,friday',
        ];
    }
}

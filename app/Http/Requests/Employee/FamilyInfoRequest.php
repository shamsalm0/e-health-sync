<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class FamilyInfoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'occupation_id' => 'required',
            'relation' => 'required',
            'nid' => 'required',
            'birth_certificate' => 'required',
            'mobile' => 'required',
            'photo' => 'required',
        ];
    }

    public function attributes(): array
    {
        return [
            'occupation_id' => 'Occupation',
            'birth_certificate' => 'Birth Certificate Number',
        ];
    }
}

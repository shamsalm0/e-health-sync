<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestPackageDetailRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'test_name_id' => ['required', 'exists:test_names,id'],
            'price' => ['required', 'numeric'],
            'commission' => ['required', 'numeric'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function attributes(): array
    {
        return [
            'test_name_id' => 'test name',
        ];
    }
}

<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TestProductCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'test_name_id' => 'required',
            'store_product_id' => 'required',
            'status' => 'required',
        ];
    }

    public function attributes(): array
    {
        return [
            'test_name_id' => 'test name',
            'store_product_id' => 'store product',
        ];
    }
}

<?php

namespace App\Http\Requests\Library;

use Illuminate\Foundation\Http\FormRequest;

class BankBranchCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'bank_id' => 'required',
            'name' => 'required',
            'address' => 'required',
            'routing_no' => 'required',

        ];
    }

    public function attributes(): array
    {
        return [
            'bank_id' => 'bank',
            'routing_no' => 'routing number',
        ];
    }
}

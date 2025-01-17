<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class BankInfoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'bank_id' => 'required',
            'bank_branch_id' => 'required',
            'account_name' => 'required',
            'account_no' => 'required',
        ];
    }

    public function attributes(): array
    {
        return [
            'bank_id' => 'bank',
            'bank_branch_id' => 'bank branch',
            'account_name' => 'account',
            'account_no' => 'account number',
        ];
    }
}

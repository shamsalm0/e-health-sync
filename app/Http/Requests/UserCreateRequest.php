<?php

namespace App\Http\Requests;

use App\Rules\NidValidationRule;
use App\Rules\PhoneValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|min:2|max:50',
            'name_bn' => 'nullable|regex:/^[\p{Bengali} ]+$/u',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|string|alpha-dash|max:255|unique:users,username',
            'nid' => ['nullable', 'unique:users,nid', new NidValidationRule],
            'contact' => ['required', 'unique:users,contact', new PhoneValidationRule],
            'address' => 'nullable',
            'address_bn' => 'nullable',
            'roles' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name_bn.required' => 'দয়া করে একটি নাম দিন।',
            'name_bn.regex' => 'দয়া করে বাংলায় নাম লিখুন',
        ];
    }
}

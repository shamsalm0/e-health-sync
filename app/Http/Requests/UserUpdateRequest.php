<?php

namespace App\Http\Requests;

use App\Rules\NidValidationRule;
use App\Rules\PhoneValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $user = $this->route('user');
        $isRequired = $user->login_status == 0;

        return [
            'name' => 'required|min:2|max:50',
            'name_bn' => 'nullable|regex:/^[\p{Bengali} ]+$/u',
            'email' => [
                $isRequired ? 'required' : 'nullable',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'username' => [
                $isRequired ? 'required' : 'nullable',
                'string',
                'alpha-dash',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'nid' => ['nullable', "unique:users,nid, $user->id", new NidValidationRule],
            'contact' => [$isRequired ? 'required' : 'nullable',  new PhoneValidationRule, Rule::unique('users')->ignore($user->id)],
            'password' => 'nullable',
            'address' => 'nullable',
            'address_bn' => 'nullable',
            'roles' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name_bn.required' => 'দয়া করে একটি নাম দিন।',
            'name_bn.regex' => 'দয়া করে বাংলায় নাম লিখুন',
        ];
    }
}

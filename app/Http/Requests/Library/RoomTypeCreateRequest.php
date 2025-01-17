<?php

namespace App\Http\Requests\Library;

use Illuminate\Foundation\Http\FormRequest;

class RoomTypeCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
        ];
    }
}

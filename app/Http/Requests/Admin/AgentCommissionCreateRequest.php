<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AgentCommissionCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'agent_type' => 'required',
            'agent_id' => 'required|exists:agents,id',
            'test_id' => 'required|required|exists:test_names,id',
            'is_percent' => 'required|boolean',
        ];
    }

    public function attributes(): array
    {
        return [
            'agent_type' => 'agent type',
            'agent_id' => 'agent',
            'test_id' => 'test',
            'is_percent' => 'percent',
        ];
    }
}

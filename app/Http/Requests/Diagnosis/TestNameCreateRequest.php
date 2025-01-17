<?php

namespace App\Http\Requests\Diagnosis;

use Illuminate\Foundation\Http\FormRequest;

class TestNameCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'test_group_id' => 'required',
            'cost' => 'required',
            'department_id' => 'nullable',
            'lab_room_id' => 'required',
            'sample_room_id' => 'required',
            'delivery_time' => 'nullable|integer|gte:0',
            'report_type_id' => 'nullable',
            'uom_id' => 'nullable',
            'free_amount' => 'nullable',
            'comment' => 'nullable',
            'is_sample' => 'nullable',
            'is_level_print' => 'nullable',
            'is_ticket_show' => 'nullable',
            'is_discount' => 'nullable',
            'is_attribute_group' => 'nullable',
            'is_title_show' => 'nullable',
            'is_unit_show' => 'nullable',
            'is_normal_unit' => 'nullable',
            'is_normal_no_unit' => 'nullable',
            'is_dialysis' => 'nullable',
            'is_physiotherapy' => 'nullable',
            'is_test' => 'nullable',
        ];
    }

    public function attributes(): array
    {
        return [
            'test_group_id' => 'test group',
            'lab_room_id' => 'lab room',
            'department_id' => 'department',
            'sample_room_id' => 'sample',
        ];
    }
}

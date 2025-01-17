@extends('admin.employee.base')
@section('form')
    <form action="{{ route('employee.curriculum.store', $employee->id) }}" method="POST">
        @csrf
        @row
            <x-form.select :options="$exams" :selected="$emp_education->exam_id" name="exam_id" label="Select Exam" />
            <x-form.select :options="$boards" :selected="$emp_education->board_id" name="board_id" label="Select Board" />
            <x-form.text-input name="year" type="text" :value="$emp_education->year" labelClass="required" label="Year"
                placeholder="year" />
            <x-form.text-input name="result" type="text" :value="$emp_education->result" labelClass="required" label="Result"
                placeholder="result" />
            <x-form.text-input name="out_of" type="text" :value="$emp_education->out_of" labelClass="required" label="Out of"
                placeholder="out of" />
        @endrow
        <div class="box-footer mt-3">
            <button type="submit" class="btn btn-primary btn-sm">Save</button>
        </div>

    </form>
@endsection

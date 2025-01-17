@extends('admin.employee.base')
@section('form')
    <form action="{{ route('employee.family.store', $employee->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @row
            <x-form.text-input name="name" type="text" :value="$emp_family->name" labelClass="required" label="Name"
                placeholder="name" />
            <x-form.select :options="$occupations" :selected="$emp_family->occupation_id" name="occupation_id" label="Select Occupation" />
            <x-form.select :options="$relations" :selected="$emp_family->relation" name="relation" label="Select Relation" />
            <x-form.text-input name="nid" type="text" :value="$emp_family->nid" labelClass="required" label="Nid No"
                placeholder="nid no" />
            <x-form.text-input name="birth_certificate" type="text" :value="$emp_family->birth_certificate" labelClass=""
                label="Birth Certificate No" placeholder="birth_certificate" />
            <x-form.text-input name="mobile" type="text" :value="$emp_family->mobile" labelClass="required" label="Mobile"
                placeholder="Mobile" />
            <x-form.text-input name="photo" type="file" :value="$emp_family->photo" labelClass="required" label="Photo"
                placeholder="photo" />
        @endrow
        <div class="box-footer mt-3">
            <button type="submit" class="btn btn-primary btn-sm">Save</button>
        </div>

    </form>
@endsection

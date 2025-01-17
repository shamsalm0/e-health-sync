@extends('admin.employee.base')
@section('form')
    <form action="{{ route('employee.basic.store') }}" method="POST">
        @csrf
        @row
            <x-form.text-input name="name" type="text" :value="$employee->name" labelClass="required" label="Name"
                placeholder="name" />
            <x-form.text-input name="father" type="text" :value="$employee->father" labelClass="required" label="Father"
                placeholder="father name" />
            <x-form.text-input name="mother" type="text" :value="$employee->mother" labelClass="required" label="Mother"
                placeholder="mother name" />
            <x-form.text-input name="dob" type="date" :value="$employee->dob" labelClass="required" label="Date of birth"
                placeholder="date of birth" />
            <x-form.text-input name="nid" type="text" :value="$employee->nid" labelClass="required" label="Nid No"
                placeholder="nid no" />
            <x-form.text-input name="emp_id" type="text" :value="$employee->emp_id" labelClass="required" label="Employee Id"
                placeholder="employee id" />
            <x-form.text-input name="driving_lisence_no" type="text" :value="$employee->driving_lisence_no" labelClass="required"
                label="Driving Lisence No" placeholder="driving lisence no" />
            <x-form.text-input name="qualification" type="text" :value="$employee->qualification" labelClass="required" label="Qualification"
                placeholder="qualification" />
            <x-form.text-input name="joining_date" type="date" :value="$employee->joining_date" labelClass="required" label="Joining Date"
                placeholder="joining date" />
            <x-form.text-input name="confirmation_date" type="date" :value="$employee->confirmation_date" labelClass="required"
                label="Confirmation Date" placeholder="confirmation date" />

            <x-form.select :options="$jobNatures" :selected="$employee->job_nature" name="job_nature" label="Select Job Nature" />
            <x-form.select :options="$genders" :selected="$employee->gender_id" name="gender_id" label="Select Gender" />
            <x-form.select :options="$religions" :selected="$employee->religion_id" name="religion_id" label="Select Religion" />
            <x-form.select :options="$bloodGroups" :selected="$employee->blood_group_id" name="blood_group_id" label="Select Blood Group" />
            <x-form.select :options="$maritalStatus" :selected="$employee->marital_status_id" name="marital_status_id" label="Select Mariatal Status" />
            <x-form.select :options="$grades" :selected="$employee->grade_id" name="grade_id" label="Select Grade" />
            <x-form.select :options="$empTypes" :selected="$employee->emp_type_id" name="emp_type_id" label="Select Emp Type" />
            <x-form.select :options="$departments" :selected="$employee->department_id" name="department_id" label="Select Department" />
            <x-form.select :options="$designations" :selected="$employee->designation_id" name="designation_id" label="Select Designation" />
            <x-form.text-input name="photo" type="file" :value="$employee->photo" labelClass="required" label="Photo"
                placeholder="photo" />
        @endrow
        <div class="box-footer mt-3">
            <button type="submit" class="btn btn-primary btn-sm">Save</button>
        </div>

    </form>
@endsection

@extends('layouts.master')
@section('title')
    Update Employee Type
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Library
        @endslot
        @slot('li2')
            Employee Type
        @endslot
        @slot('li2Url')
            employee-type.index
        @endslot
        @slot('title')
            Update Employee Type
        @endslot
    @endcomponent
    <x-alert />
    <form method="POST" action="{{ route('employee-type.update', $employeeType->id) }}" role="form"
        enctype="multipart/form-data">
        @method('PUT')
        @csrf
        @include('admin.library.employee-type.form')
    </form>
@endsection


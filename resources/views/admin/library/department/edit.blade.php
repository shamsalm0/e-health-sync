@extends('layouts.master')
@section('title')
    Update Department
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Library
        @endslot
        @slot('li2')
            Department
        @endslot
        @slot('li2Url')
            department.index
        @endslot
        @slot('title')
            Update Department
        @endslot
    @endcomponent
    <x-alert />
    <form method="POST" action="{{ route('department.update', $department->id) }}" role="form"
        enctype="multipart/form-data">
        @method('PUT')
        @csrf
        @include('admin.library.department.form')
    </form>
@endsection


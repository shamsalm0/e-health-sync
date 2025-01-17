@extends('layouts.master')
@section('title')
    Create Department
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
            Create Department
        @endslot
    @endcomponent
    <form method="POST" action="{{ route('department.store') }}" role="form" enctype="multipart/form-data">
        @csrf
        @include('admin.library.department.form')
    </form>
@endsection


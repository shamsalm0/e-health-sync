@extends('layouts.master')
@section('title')
    Create Employee Type
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
            Create Employee Type
        @endslot
    @endcomponent
    <form method="POST" action="{{ route('employee-type.store') }}" role="form" enctype="multipart/form-data">
        @csrf
        @include('admin.library.employee-type.form')
    </form>
@endsection


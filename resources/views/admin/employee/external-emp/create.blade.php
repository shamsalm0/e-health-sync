@extends('layouts.master')

@section('title')
        Create External Emp
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            External Emp
        @endslot
        @slot('li2')
            List
        @endslot
        @slot('li2Url')
            external-emp.index
        @endslot
        @slot('title')
            Create External Emp
        @endslot
    @endcomponent

    <form action="{{ route('external-emp.store') }}" method="POST"  role="form" enctype="multipart/form-data">
        @csrf

        @include('admin.employee.external-emp.form')

    </form>
@endsection

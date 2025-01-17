@extends('layouts.master')
@section('title')
    Employee List
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Library
        @endslot
        @slot('li2')
            Employee
        @endslot
        @slot('li2Url')
            employee.index
        @endslot
        @slot('title')
            Employee List
        @endslot
    @endcomponent

    @livewire('admin.employee.employee-list')
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection

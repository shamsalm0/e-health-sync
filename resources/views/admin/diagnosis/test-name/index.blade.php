@extends('layouts.master')
@section('title')
    Test Name List
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Diagnosis
        @endslot
        @slot('li2')
            Test Name
        @endslot
        @slot('li2Url')
            test-name.index
        @endslot
        @slot('title')
            Test Name List
        @endslot
    @endcomponent

    @livewire('admin.diagnosis.test-name-list')
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection

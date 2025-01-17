@extends('layouts.master')
@section('title')
    Test Attribute List
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
            Test Attribute
        @endslot
        @slot('li2Url')
            test-attribute.index
        @endslot
        @slot('title')
            Test Attribute List
        @endslot
    @endcomponent

    @livewire('admin.diagnosis.test-attribute-list')
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection

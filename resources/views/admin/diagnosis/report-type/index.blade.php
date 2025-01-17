@extends('layouts.master')
@section('title')
    Report Type List
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
            Report Type
        @endslot
        @slot('li2Url')
            report-type.index
        @endslot
        @slot('title')
            Report Type List
        @endslot
    @endcomponent

    @livewire('admin.diagnosis.report-type-list')
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection
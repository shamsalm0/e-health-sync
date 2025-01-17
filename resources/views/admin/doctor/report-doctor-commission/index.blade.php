@extends('layouts.master')
@section('title')
    Report Doctor Commission
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Doctor
        @endslot
        @slot('li2')
            Report Doctor Commission
        @endslot
        @slot('li2Url')
            bank.index
        @endslot
        @slot('title')
        Report Doctor Commission
        @endslot
    @endcomponent

    @livewire('admin.doctor.report-doctor-commission')
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection

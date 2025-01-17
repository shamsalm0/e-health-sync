@extends('layouts.master')
@section('title')
    Diagnosis Money Receive List
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
            Diagnosis Money Receive List
        @endslot
        @slot('li2Url')
            diagnosis-money-receive.list
        @endslot
        @slot('title')
            Diagnosis Money Receive List
        @endslot
    @endcomponent

    @livewire('admin.diagnosis.diagnosis-money-receive-list')
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection

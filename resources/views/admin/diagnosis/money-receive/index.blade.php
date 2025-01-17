@extends('layouts.master')
@section('title')
    New Diagnosis Test
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
            diagnosis-money-receive.index
        @endslot
        @slot('title')
            New Diagnosis Test
        @endslot
    @endcomponent

    @livewire('admin.diagnosis.diagnosis-money-receive')
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{ URL::asset('build/js/pages/dashboard-ecommerce.init.js') }}"></script>
@endsection

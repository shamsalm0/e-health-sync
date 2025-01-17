@extends('layouts.master')
@section('title')
    Test Package Details
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
            Test Package
        @endslot
        @slot('li2Url')
            test-package.index
        @endslot
        @slot('title')
            Test Package details
        @endslot
    @endcomponent

    @livewire('admin.diagnosis.test-package-detail-list')
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection

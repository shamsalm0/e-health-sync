@extends('layouts.master')
@section('title')
    Test Group List
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
            Test Group
        @endslot
        @slot('li2Url')
            test-group.index
        @endslot
        @slot('title')
            Test Group List
        @endslot
    @endcomponent

    @livewire('admin.diagnosis.test-group-list')
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection

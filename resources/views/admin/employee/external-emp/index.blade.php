@extends('layouts.master')
@section('title')
        External Emp
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
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
            External Emp Information
        @endslot
    @endcomponent

    @livewire('list.external-emp')
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection

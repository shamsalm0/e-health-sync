@extends('layouts.master')
@section('title')
    Marital Status
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
            Marital Status List
        @endslot
        @slot('li2Url')
            marital-status.index
        @endslot
        @slot('title')
            Marital Status List
        @endslot
    @endcomponent

    @livewire('list.marital-status')
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection

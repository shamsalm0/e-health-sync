@extends('layouts.master')
@section('title')
    Specialization List
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
            Specialization
        @endslot
        @slot('li2Url')
            specialization.index
        @endslot
        @slot('title')
            Specialization List
        @endslot
    @endcomponent

    @livewire('admin.library.specialization-list')
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection

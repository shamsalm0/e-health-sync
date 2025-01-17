@extends('layouts.master')
@section('title')
    Gender List
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
            Gender
        @endslot
        @slot('li2Url')
            gender.index
        @endslot
        @slot('title')
            Gender List
        @endslot
    @endcomponent

    @livewire('list.gender')
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection

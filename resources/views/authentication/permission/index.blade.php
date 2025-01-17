@extends('layouts.master')
@section('title')
    Permissions
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
            Permissions
        @endslot
        @slot('li2Url')
            permission.index
        @endslot
        @slot('title')
            Permission List
        @endslot
    @endcomponent

    @livewire('authentication.permission-list')
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection

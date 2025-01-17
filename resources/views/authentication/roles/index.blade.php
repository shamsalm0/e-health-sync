@extends('layouts.master')
@section('title')
    Roles
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
            Roles
        @endslot
        @slot('li2Url')
            roles.index
        @endslot
        @slot('title')
            Role List
        @endslot
    @endcomponent

    @livewire('authentication.role-list')
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection

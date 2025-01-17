@extends('layouts.master')
@section('title')
    Users
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Users
        @endslot
        @slot('li2')
            Users
        @endslot
        @slot('li2Url')
            user.index
        @endslot
        @slot('title')
            User List
        @endslot
    @endcomponent

    @livewire('authentication.user-list')
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection

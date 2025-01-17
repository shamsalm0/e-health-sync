@extends('layouts.master')
@section('title')
    Login History
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Login History
        @endslot
        @slot('li2')
            Login History
        @endslot
        @slot('li2Url')
        login.history.list
        @endslot
        @slot('title')
        Login History List
        @endslot
    @endcomponent

    @livewire('authentication.login-history-list')
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection

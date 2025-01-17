@extends('layouts.master')
@section('title')
    Bank List
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
            Bank
        @endslot
        @slot('li2Url')
            bank.index
        @endslot
        @slot('title')
            Bank List
        @endslot
    @endcomponent

    @livewire('admin.library.bank-list')
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection

@extends('layouts.master')
@section('title')
    Bank Branch List
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
            Bank Branch
        @endslot
        @slot('li2Url')
            bank-branch.index
        @endslot
        @slot('title')
            Bank Branch List
        @endslot
    @endcomponent

    @livewire('admin.library.bank-branch-list')
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection

@extends('layouts.master')
@section('title')
    Division List
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
            Division
        @endslot
        @slot('li2Url')
            division.index
        @endslot
        @slot('title')
            Division List
        @endslot
    @endcomponent

    @livewire('admin.library.division-list')
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection

@extends('layouts.master')
@section('title')
    Union List
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
            Union
        @endslot
        @slot('li2Url')
            union.index
        @endslot
        @slot('title')
            Union List
        @endslot
    @endcomponent

    @livewire('admin.library.union-list')
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection

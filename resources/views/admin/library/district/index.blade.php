@extends('layouts.master')
@section('title')
    District List
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
            District
        @endslot
        @slot('li2Url')
            district.index
        @endslot
        @slot('title')
            District List
        @endslot
    @endcomponent

    @livewire('admin.library.district-list')
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection

@extends('layouts.master')
@section('title')
    Upazila List
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
            Upazila
        @endslot
        @slot('li2Url')
            upazila.index
        @endslot
        @slot('title')
            Upazila List
        @endslot
    @endcomponent

    @livewire('admin.library.upazila-list')
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection

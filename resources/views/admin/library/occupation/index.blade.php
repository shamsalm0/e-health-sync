@extends('layouts.master')
@section('title')
    Occupation List
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
            Occupation
        @endslot
        @slot('li2Url')
            occupation.index
        @endslot
        @slot('title')
            Occupation List
        @endslot
    @endcomponent

    @livewire('admin.library.occupation-list')
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection

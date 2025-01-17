@extends('layouts.master')
@section('title')
        Hospital Counter
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Hospital Counter
        @endslot
        @slot('li2')
            List
        @endslot
        @slot('li2Url')
            hospital-counter.index
        @endslot
        @slot('title')
            Hospital Counter Information
        @endslot
    @endcomponent

    @livewire('list.hospital-counter')
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection

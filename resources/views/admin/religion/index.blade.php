@extends('layouts.master')
@section('title')
        Religion
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Religion
        @endslot
        @slot('li2')
            List
        @endslot
        @slot('li2Url')
            religion.index
        @endslot
        @slot('title')
            Religion Information
        @endslot
    @endcomponent

    @livewire('list.religion')
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection

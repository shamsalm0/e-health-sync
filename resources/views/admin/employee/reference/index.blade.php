@extends('layouts.master')
@section('title')
        Reference
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Reference
        @endslot
        @slot('li2')
            List
        @endslot
        @slot('li2Url')
            reference.index
        @endslot
        @slot('title')
            Reference Information
        @endslot
    @endcomponent

    @livewire('list.reference')
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection

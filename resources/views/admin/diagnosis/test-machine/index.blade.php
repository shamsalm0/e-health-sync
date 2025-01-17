@extends('layouts.master')
@section('title')
        Test Machine
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Test Machine
        @endslot
        @slot('li2')
            List
        @endslot
        @slot('li2Url')
            test-machine.index
        @endslot
        @slot('title')
            Test Machine Information
        @endslot
    @endcomponent

    @livewire('list.test-machine')
@endsection

@section('script')
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection

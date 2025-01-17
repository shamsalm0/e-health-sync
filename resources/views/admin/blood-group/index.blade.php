@extends('layouts.master')
@section('title')
        Blood Group
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Blood Group
        @endslot
        @slot('li2')
            List
        @endslot
        @slot('li2Url')
            blood-group.index
        @endslot
        @slot('title')
            Blood Group Information
        @endslot
    @endcomponent

    @livewire('list.blood-group')
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection

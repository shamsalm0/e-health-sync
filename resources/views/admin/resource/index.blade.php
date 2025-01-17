@extends('layouts.master')
@section('title')
        Resource List
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Resource
        @endslot
        @slot('li2')
            List
        @endslot
        @slot('li2Url')
            resource.index
        @endslot
        @slot('title')
            Resource List
        @endslot
    @endcomponent

    @livewire('list.resource')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

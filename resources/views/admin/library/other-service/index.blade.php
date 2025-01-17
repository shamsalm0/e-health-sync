@extends('layouts.master')
@section('title')
        Other Service
@endsection


@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Other Service
        @endslot
        @slot('li2')
            List
        @endslot
        @slot('li2Url')
            other-service.index
        @endslot
        @slot('title')
            Other Service Information
        @endslot
    @endcomponent

    @livewire('admin.library.other-service')
@endsection
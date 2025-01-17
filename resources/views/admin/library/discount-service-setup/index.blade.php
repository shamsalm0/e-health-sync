@extends('layouts.master')
@section('title')
        Discount Service Setup
@endsection


@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Discount Service Setup
        @endslot
        @slot('li2')
            List
        @endslot
        @slot('li2Url')
            discount-service-setup.index
        @endslot
        @slot('title')
            Discount Service Setup Information
        @endslot
    @endcomponent

    @livewire('admin.library.discount-service-setup')
@endsection
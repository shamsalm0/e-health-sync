@extends('layouts.master')
@section('title')
    Test Product
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Test Product
        @endslot
        @slot('li2')
            List
        @endslot
        @slot('li2Url')
            test-product.index
        @endslot
        @slot('title')
            Test Product Information
        @endslot
    @endcomponent

    @livewire('list.test-product')
@endsection

@section('script')
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection

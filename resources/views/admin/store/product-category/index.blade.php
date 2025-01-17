@extends('layouts.master')
@section('title')
    Product Category List
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Store
        @endslot
        @slot('li2')
            Product Category
        @endslot
        @slot('li2Url')
            store.product-category.index
        @endslot
        @slot('title')
            Product Category List
        @endslot
    @endcomponent

    @livewire('admin.store.product-category-list')
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/list.js/list.min.js') }}"></script>
    {{-- <script src="{{ URL::asset('build/libs/list.pagination.js/list.pagination.min.js') }}"></script> --}}
    {{-- <script src="{{ URL::asset('build/js/pages/ticketlist.init.js') }}"></script> --}}
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/sweetalerts.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection

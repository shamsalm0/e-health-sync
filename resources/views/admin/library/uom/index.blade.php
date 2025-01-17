@extends('layouts.master')
@section('title')
    Uom List
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Library
        @endslot
        @slot('li2')
            Uom
        @endslot
        @slot('li2Url')
            uom.index
        @endslot
        @slot('title')
            Uom List
        @endslot
    @endcomponent

    @livewire('admin.library.uom-list')
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection

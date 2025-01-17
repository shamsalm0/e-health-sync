@extends('layouts.master')
@section('title')
    Symptom List
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
            Symptom
        @endslot
        @slot('li2Url')
            symptom.index
        @endslot
        @slot('title')
            Symptom List
        @endslot
    @endcomponent

    @livewire('admin.library.symptom-list')
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection

@extends('layouts.master')
@section('title')
    Emp Exam
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Emp Exam
        @endslot
        @slot('li2')
            List
        @endslot
        @slot('li2Url')
            emp-exam.index
        @endslot
        @slot('title')
            Emp Exam Information
        @endslot
    @endcomponent

    @livewire('list.emp-exam')
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection

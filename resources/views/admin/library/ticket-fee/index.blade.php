@extends('layouts.master')
@section('title')
        Ticket Fee
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Ticket Fee
        @endslot
        @slot('li2')
            List
        @endslot
        @slot('li2Url')
            ticket-fee.index
        @endslot
        @slot('title')
            Ticket Fee Information
        @endslot
    @endcomponent

    @livewire('list.ticket-fee')
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection

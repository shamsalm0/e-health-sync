@extends('layouts.master')
@section('title')
        Agent Commission
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Agent Commission
        @endslot
        @slot('li2')
            List
        @endslot
        @slot('li2Url')
            agent-commission.index
        @endslot
        @slot('title')
            Agent Commission Information
        @endslot
    @endcomponent

    @livewire('list.agent-commission')
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection

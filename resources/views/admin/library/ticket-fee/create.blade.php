@extends('layouts.master')

@section('title')
        Create Ticket Fee
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
            Create Ticket Fee
        @endslot
    @endcomponent

    <form action="{{ route('ticket-fee.store') }}" method="POST"  role="form" enctype="multipart/form-data">
        @csrf
        @include('admin.library.ticket-fee.form')
    </form>
@endsection

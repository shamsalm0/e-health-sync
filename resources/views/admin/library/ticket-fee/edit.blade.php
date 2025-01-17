@extends('layouts.master')

@section('title')
    Update Ticket Fee
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
            Update Ticket Fee
        @endslot
    @endcomponent

    <form action="{{ route('ticket-fee.update', $ticketFee->id) }}" method="POST" role="form"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.library.ticket-fee.form')

    </form>
@endsection

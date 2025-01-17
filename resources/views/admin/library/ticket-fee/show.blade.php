@extends('layouts.master')
@section('title')
    Show Ticket Fee
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
            Show Ticket Fee
        @endslot
    @endcomponent
    <div class="card">
        <div class="card-body">
            <x-table class="table mb-0">
                <tr>
                    <td width="160">Type</td>
                    <td width="30" class="text-center">:</td>
                    @php
                        $type = '';
                        if ($ticketFee->type == 1) {
                            $type = 'General Physician';
                        } elseif ($ticketFee->type == 2) {
                            $type = 'Emergency';
                        } elseif ($ticketFee->type == 3) {
                            $type = 'Registration';
                        } elseif ($ticketFee->type == 4) {
                            $type = 'Serial';
                        }
                    @endphp
                    <th>{{ $type }}</th>
                </tr>
                <tr>
                    <td width="160">Price</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $ticketFee->price }}</th>
                </tr>
                <tr>
                    <td width="160">Status</td>
                    <td width="30" class="text-center">:</td>
                    <th><x-status :status="$ticketFee->status" /></th>
                </tr>
            </x-table>
        </div>
    </div>
    <a href="{{ route('ticket-fee.index') }}" class="btn btn-outline-dark">Back</a>
@endsection

@extends('layouts.master')
@section('title')
    Show Hospital Counter
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Hospital Counter
        @endslot
        @slot('li2')
            List
        @endslot
        @slot('li2Url')
            hospital-counter.index
        @endslot
        @slot('title')
            Show Hospital Counter
        @endslot
    @endcomponent
    <div class="card">
        <div class="card-body">
            <x-table class="table mb-0">
                <tr>
                    <td width="160">Branch Id</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $hospitalCounter->branch?->name }}</th>
                </tr>
                <tr>
                    <td width="160">Building Id</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $hospitalCounter->building?->name }}</th>
                </tr>
                <tr>
                    <td width="160">Floor Id</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $hospitalCounter->floor?->name }}</th>
                </tr>
                <tr>
                    <td width="160">Start Time</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $hospitalCounter->start_time }}</th>
                </tr>
                <tr>
                    <td width="160">End Time</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $hospitalCounter->end_time }}</th>
                </tr>
                <tr>
                    <td width="160">Remarks</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $hospitalCounter->remarks }}</th>
                </tr>
                <tr>
                    <td width="160">Name</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $hospitalCounter->name }}</th>
                </tr>
                <tr>
                    <td width="160">Status</td>
                    <td width="30" class="text-center">:</td>
                    <th><x-status :status="$hospitalCounter->status" /></th>
                </tr>
            </x-table>
        </div>
    </div>
    <a href="{{ route('hospital-counter.index') }}" class="btn btn-outline-dark">Back</a>
@endsection

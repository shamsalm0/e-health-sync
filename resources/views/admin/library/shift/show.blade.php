@extends('layouts.master')
@section('title')
    @lang('translation.starter')
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Library
        @endslot
        @slot('li2')
            Shifts
        @endslot
        @slot('li2Url')
            shift.index
        @endslot
        @slot('title')
            Shift Details
        @endslot
    @endcomponent
    <div class="card">
        <div class="card-body">
            <x-table class="table mb-0">
                <tr>
                    <td width="160">Branch</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $shift->branch?->name }}</th>
                </tr>
                <tr>
                    <td width="160">Name</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $shift->name }}</th>
                </tr>
                <tr>
                    <td width="160">From</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $shift->from }}</th>
                </tr>
                <tr>
                    <td width="160">To</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $shift->to }}</th>
                </tr>
                <tr>
                    <td width="160">Status</td>
                    <td width="30" class="text-center">:</td>
                    <th><x-status :status="$shift->status" /></th>
                </tr>
            </x-table>
        </div>
    </div>
    <a href="{{ route('shift.index') }}" class="btn btn-outline-dark">Back</a>
@endsection


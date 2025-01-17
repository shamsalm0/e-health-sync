@extends('layouts.master')
@section('title')
   Machine Details
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Diagnosis
        @endslot
        @slot('li2')
            Machine
        @endslot
        @slot('li2Url')
            machine.index
        @endslot
        @slot('title')
            Machine Details
        @endslot
    @endcomponent
    <div class="card">
        <div class="card-body">
            <x-table class="table mb-0">
                <tr>
                    <td width="160">Name</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $reportType->name }}</th>
                </tr>
                <tr>
                    <td width="160">Status</td>
                    <td width="30" class="text-center">:</td>
                    <th><x-status :status="$reportType->status" /></th>
                </tr>
            </x-table>
        </div>
    </div>
    <a href="{{ route('report-type.index') }}" class="btn btn-outline-dark">Back</a>
@endsection


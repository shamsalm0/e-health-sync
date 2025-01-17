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
            Hospital Building
        @endslot
        @slot('li2Url')
            hospital-building.index
        @endslot
        @slot('title')
            Building Details
        @endslot
    @endcomponent
    <div class="card">
        <div class="card-body">
            <x-table class="table mb-0">
                <tr>
                    <td width="160">Name</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $building->name }}</th>
                </tr>

                <tr>
                    <td width="160">Phone</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $building->phone }}</th>
                </tr>
                <tr>
                    <td width="160">Email</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $building->email }}</th>
                </tr>
                <tr>
                    <td width="160">Address</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $building->address }}</th>
                </tr>
                <tr>
                    <td width="160">Status</td>
                    <td width="30" class="text-center">:</td>
                    <th><x-status :status="$building->status" /></th>
                </tr>
            </x-table>
        </div>
    </div>
    <a href="{{ route('hospital-building.index') }}" class="btn btn-outline-dark">Back</a>
@endsection


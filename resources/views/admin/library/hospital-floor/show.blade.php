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
            Hospital Floor
        @endslot
        @slot('li2Url')
            hospital-floor.index
        @endslot
        @slot('title')
            Hospital Floor Details
        @endslot
    @endcomponent
    <div class="card">
        <div class="card-body">
            <x-table class="table mb-0">
                <tr>
                    <td width="160">Name</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $hospital_floor->name }}</th>
                </tr>
                <tr>
                    <td width="160">Branch</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $hospital_floor->branch?->name }}</th>
                </tr>
                <tr>
                    <td width="160">Building</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $hospital_floor->building?->name }}</th>
                </tr>
                    <td width="160">Status</td>
                    <td width="30" class="text-center">:</td>
                    <th><x-status :status="$hospital_floor->status" /></th>
                </tr>
            </x-table>
        </div>
    </div>
    <a href="{{ route('hospital-floor.index') }}" class="btn btn-outline-dark">Back</a>
@endsection


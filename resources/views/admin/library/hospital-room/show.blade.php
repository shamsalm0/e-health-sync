@extends('layouts.master')
@section('title')
    Hospital Room
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Library
        @endslot
        @slot('li2')
            Hospital Room
        @endslot
        @slot('li2Url')
            hospital-room.index
        @endslot
        @slot('title')
        Hospital Room Details
        @endslot
    @endcomponent
    <div class="card">
        <div class="card-body">
            <x-table class="table mb-0">
                <tr>
                    <td width="160">Name</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $hospital_room->name }}</th>
                </tr>
                <tr>
                    <td width="160">Branch</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $hospital_room->branch?->name }}</th>
                </tr>
                <tr>
                    <td width="160">Building</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $hospital_room->building?->name  }}</th>
                </tr>
                <tr>
                    <td width="160">Type No.</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $hospital_room->roomType?->name }}</th>
                </tr>
                <tr>
                    <td width="160">Room No.</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $hospital_room->room_no }}</th>
                </tr>
                <tr>
                    <td width="160">Phone</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $hospital_room->phone }}</th>
                </tr>
                <tr>
                    <td width="160">Details</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $hospital_room->details }}</th>
                </tr>
                <tr>
                    <td width="160">Status</td>
                    <td width="30" class="text-center">:</td>
                    <th><x-status :status="$hospital_room->status" /></th>
                </tr>
            </x-table>
        </div>
    </div>
    <a href="{{ route('hospital-room.index') }}" class="btn btn-outline-dark">Back</a>
@endsection


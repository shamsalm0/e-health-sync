@extends('layouts.master')
@section('title')
    Show Other Service
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Other Service
        @endslot
        @slot('li2')
            List
        @endslot
        @slot('li2Url')
            other-service.index
        @endslot
        @slot('title')
            Show Other Service
        @endslot
    @endcomponent
    <div class="card">
        <div class="card-body">
            <x-table class="table mb-0">
                <tr>
                    <td width="160">Name</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $otherService->name }}</th>
                </tr>
                <tr>
                    <td width="160">Price</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $otherService->price }}</th>
                </tr>
                <tr>
                    <td width="160">Service Id</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $otherService->discountServices?->service_name }}</th>
                </tr>
                <tr>
                    <td width="160">Description</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $otherService->description }}</th>
                </tr>
                <tr>
                    <td width="160">Doctor Status</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $otherService->doctor_status ? 'Include' : 'Not Include' }}</th>
                </tr>
                <tr>
                    <td width="160">Nurse Status</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $otherService->nurse_status ? 'Include' : 'Not Include' }}</th>
                </tr>
                <tr>
                    <td width="160">Word Boy Status</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $otherService->word_boy_status ? 'Include' : 'Not Include' }}</th>
                </tr>
                <tr>
                    <td width="160">Status</td>
                    <td width="30" class="text-center">:</td>
                    <th><x-status :status="$otherService->status" /></th>
                </tr>
            </x-table>
        </div>
    </div>
    <a href="{{ route('other-service.index') }}" class="btn btn-outline-dark">Back</a>
@endsection
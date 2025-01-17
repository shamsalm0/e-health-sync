@extends('layouts.master')
@section('title')
    Show Discount Service Setup
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Discount Service Setup
        @endslot
        @slot('li2')
            List
        @endslot
        @slot('li2Url')
            discount-service-setup.index
        @endslot
        @slot('title')
            Show Discount Service Setup
        @endslot
    @endcomponent
    <div class="card">
        <div class="card-body">
            <x-table class="table mb-0">
                <tr>
                    <td width="160">Service Name</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $discountServiceSetup->service_name }}</th>
                </tr>
                <tr>
                    <td width="160">Department Id</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $discountServiceSetup->department?->name }}</th>
                </tr>
                <tr>
                    <td width="160">Has Discount</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $discountServiceSetup->has_discount ? 'Yes' : 'No' }}</th>
                </tr>
                <tr>
                    <td width="160">Has Commission</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $discountServiceSetup->has_commission ? 'Yes' : 'No' }}</th>
                </tr>
                <tr>
                    <td width="160">Is Refundable</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $discountServiceSetup->is_refundable ? 'Yes' : 'No' }}</th>
                </tr>
                <tr>
                    <td width="160">In Others</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $discountServiceSetup->in_others ? 'Yes' : 'No' }}</th>
                </tr>
                <tr>
                    <td width="160">Status</td>
                    <td width="30" class="text-center">:</td>
                    <th><x-status :status="$discountServiceSetup->status" /></th>
                </tr>
            </x-table>
        </div>
    </div>
    <a href="{{ route('discount-service-setup.index') }}" class="btn btn-outline-dark">Back</a>
@endsection
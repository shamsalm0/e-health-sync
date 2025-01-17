@extends('layouts.master')
@section('title')
    Show Resource
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Resource
        @endslot
        @slot('li2')
            List
        @endslot
        @slot('li2Url')
            resource.index
        @endslot
        @slot('title')
            Show Resource
        @endslot
    @endcomponent
    <div class="card">
        <div class="card-body">
            <x-table class="table mb-0">
                <tr>
                    <td width="160">Branch</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $resource->branch?->name }}</th>
                </tr>
                <tr>
                    <td width="160">Resource Type</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $resource->resource_type }}</th>
                </tr>
                <tr>
                    <td width="160">Name</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $resource->name }}</th>
                </tr>
                <tr>
                    <td width="160">Father</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $resource->father }}</th>
                </tr>
                <tr>
                    <td width="160">Mother</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $resource->mother }}</th>
                </tr>
                <tr>
                    <td width="160">Dob</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $resource->dob }}</th>
                </tr>
                <tr>
                    <td width="160">Personal Mobile</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $resource->personal_mobile }}</th>
                </tr>
                <tr>
                    <td width="160">Mobile</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $resource->mobile }}</th>
                </tr>
                <tr>
                    <td width="160">Phone</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $resource->phone }}</th>
                </tr>
                <tr>
                    <td width="160">Email</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $resource->email }}</th>
                </tr>
                <tr>
                    <td width="160">Nid</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $resource->nid }}</th>
                </tr>
                <tr>
                    <td width="160">Gender</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $resource->gender?->name }}</th>
                </tr>
                <tr>
                    <td width="160">C District Id</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $resource->c_district_id }}</th>
                </tr>
                <tr>
                    <td width="160">C Upazila Id</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $resource->c_upazila_id }}</th>
                </tr>
                <tr>
                    <td width="160">C Address</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $resource->c_address }}</th>
                </tr>
                <tr>
                    <td width="160">P District Id</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $resource->p_district_id }}</th>
                </tr>
                <tr>
                    <td width="160">P Upazila Id</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $resource->p_upazila_id }}</th>
                </tr>
                <tr>
                    <td width="160">P Address</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $resource->p_address }}</th>
                </tr>
                <tr>
                    <td width="160">Blood Group Id</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $resource->blood_group_id }}</th>
                </tr>
                <tr>
                    <td width="160">Status</td>
                    <td width="30" class="text-center">:</td>
                    <th><x-status :status="$resource->status" /></th>
                </tr>
            </x-table>
        </div>
    </div>
    <a href="{{ route('resource.index') }}" class="btn btn-outline-dark">Back</a>
@endsection

@extends('layouts.master')
@section('title')
    Show Reference
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Reference
        @endslot
        @slot('li2')
            List
        @endslot
        @slot('li2Url')
            reference.index
        @endslot
        @slot('title')
            Show Reference
        @endslot
    @endcomponent
    <div class="card">
        <div class="card-body">
            <x-table class="table mb-0">
                <tr>
                    <td width="160">Branch Id</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $reference->branch?->name }}</th>
                </tr>
                <tr>
                    <td width="160">Name</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $reference->name }}</th>
                </tr>
                <tr>
                    <td width="160">Mobile</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $reference->mobile }}</th>
                </tr>
                <tr>
                    <td width="160">Phone</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $reference->phone }}</th>
                </tr>
                <tr>
                    <td width="160">District Id</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $reference->district?->name }}</th>
                </tr>
                <tr>
                    <td width="160">Upazila Id</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $reference->upazila?->name }}</th>
                </tr>
                <tr>
                    <td width="160">Address</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $reference->address }}</th>
                </tr>
                <tr>
                    <td width="160">Reference Type</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $reference->reference_type }}</th>
                </tr>
                <tr>
                    <td width="160">Qualification</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $reference->qualification }}</th>
                </tr>
                <tr>
                    <td width="160">Department Id</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $reference->department?->name }}</th>
                </tr>
                <tr>
                    <td width="160">Is Surgeon</td>
                    <td width="30" class="text-center">:</td>
                    <th><x-status :status="$reference->is_surgeon" label="true"/></th>
                </tr>
                <tr>
                    <td width="160">Is Anesthesia</td>
                    <td width="30" class="text-center">:</td>
                    <th><x-status :status="$reference->is_anesthesia" label="true"/></th>
                </tr>
                <tr>
                    <td width="160">Is Consultant</td>
                    <td width="30" class="text-center">:</td>
                    <th><x-status :status="$reference->is_consultant" label="true"/></th>
                </tr>
                <tr>
                    <td width="160">Is Ultrasonogram</td>
                    <td width="30" class="text-center">:</td>
                    <th><x-status :status="$reference->is_ultrasonogram" label="true"/></th>
                </tr>
                <tr>
                    <td width="160">Is Report Doctor</td>
                    <td width="30" class="text-center">:</td>
                    <th><x-status :status="$reference->is_report_doctor" label="true"/></th>
                </tr>
                <tr>
                    <td width="160">Status</td>
                    <td width="30" class="text-center">:</td>
                    <th><x-status :status="$reference->status" /></th>
                </tr>
            </x-table>
        </div>
    </div>
    <a href="{{ route('reference.index') }}" class="btn btn-outline-dark">Back</a>
@endsection

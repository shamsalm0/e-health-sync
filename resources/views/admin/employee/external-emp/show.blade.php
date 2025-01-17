@extends('layouts.master')
@section('title')
    Show External Emp
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            External Emp
        @endslot
        @slot('li2')
            List
        @endslot
        @slot('li2Url')
            external-emp.index
        @endslot
        @slot('title')
            Show External Emp
        @endslot
    @endcomponent
    <div class="card">
        <div class="card-body">
            <x-table class="table mb-0">
                <tr>
                    <td width="160">Branch Id</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $externalEmp->branch?->name }}</th>
                </tr>
                <tr>
                    <td width="160">Name</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $externalEmp->name }}</th>
                </tr>
                <tr>
                    <td width="160">Designation Id</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $externalEmp->designation?->name }}</th>
                </tr>
                <tr>
                    <td width="160">Department Id</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $externalEmp->department?->name }}</th>
                </tr>
                <tr>
                    <td width="160">Emp Type Id</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $externalEmp->employeeType?->name }}</th>
                </tr>
                <tr>
                    <td width="160">Mobile</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $externalEmp->mobile }}</th>
                </tr>
                <tr>
                    <td width="160">Phone</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $externalEmp->phone }}</th>
                </tr>
                <tr>
                    <td width="160">External Type</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $externalEmp->external_type }}</th>
                </tr>
                <tr>
                    <td width="160">Qualification</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $externalEmp->qualification }}</th>
                </tr>
                <tr>
                    <td width="160">Address</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $externalEmp->address }}</th>
                </tr>
                <tr>
                    <td width="160">Remark</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $externalEmp->remark }}</th>
                </tr>
                <tr>
                    <td width="160">Status</td>
                    <td width="30" class="text-center">:</td>
                    <th><x-status :status="$externalEmp->status" /></th>
                </tr>
            </x-table>
        </div>
    </div>
    <a href="{{ route('external-emp.index') }}" class="btn btn-outline-dark">Back</a>
@endsection

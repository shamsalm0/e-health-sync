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
            Departments
        @endslot
        @slot('li2Url')
            department.index
        @endslot
        @slot('title')
            Department Details
        @endslot
    @endcomponent
    <div class="card">
        <div class="card-body">
            <x-table class="table mb-0">
                <tr>
                    <td width="160">Name</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $department->name }}</th>
                </tr>
                <tr>
                    <td width="160">Code</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $department->code }}</th>
                </tr>
                <tr>
                    <td width="160">Phone</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $department->phone }}</th>
                </tr>
                <tr>
                    <td width="160">Email</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $department->email }}</th>
                </tr>
                <tr>
                    <td width="160">Status</td>
                    <td width="30" class="text-center">:</td>
                    <th><x-status :status="$department->status" /></th>
                </tr>
            </x-table>
        </div>
    </div>
    <a href="{{ route('department.index') }}" class="btn btn-outline-dark">Back</a>
@endsection


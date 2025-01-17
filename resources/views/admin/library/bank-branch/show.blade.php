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
            Bank Branches
        @endslot
        @slot('li2Url')
            bank-branch.index
        @endslot
        @slot('title')
            Bank Branch Details
        @endslot
    @endcomponent
    <div class="card">
        <div class="card-body">
            <x-table class="table mb-0">
                <tr>
                    <td width="160">Name</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $bankBranch->name }}</th>
                </tr>
                <tr>
                    <td width="160">Bank</td>
                    <td width="30" class="text-center">:</td>
                    <td>{{ $bankBranch->bank?->name }}</td>
                </tr>
                <tr>
                    <td width="160">Address</td>
                    <td width="30" class="text-center">:</td>
                    <td>{{ $bankBranch->address }}</td>
                </tr>
                <tr>
                    <td width="160">Routing No.</td>
                    <td width="30" class="text-center">:</td>
                    <td>{{ $bankBranch->routing_no }}</td>
                </tr>
                <tr>
                    <td width="160">Status</td>
                    <td width="30" class="text-center">:</td>
                    <th><x-status :status="$bankBranch->status" /></th>
                </tr>
            </x-table>
        </div>
    </div>
    <a href="{{ route('bank-branch.index') }}" class="btn btn-outline-dark">Back</a>
@endsection


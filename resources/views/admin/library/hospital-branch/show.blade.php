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
            Hospital Branch
        @endslot
        @slot('li2Url')
            hospital-branch.index
        @endslot
        @slot('title')
             Branch Details
        @endslot
    @endcomponent
    <div class="card">
        <div class="card-body">
            <x-table class="table mb-0">
                <tr>
                    <td width="160">Name</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $branch->name }}</th>
                </tr>
                <tr>
                    <td width="160">Mobile</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $branch->mobile }}</th>
                </tr>
                <tr>
                    <td width="160">Phone</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $branch->phone }}</th>
                </tr>
                <tr>
                    <td width="160">Email</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $branch->email }}</th>
                </tr>
                <tr>
                    <td width="160">Address</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $branch->address }}</th>
                </tr>
                <tr>
                    <td width="160">Status</td>
                    <td width="30" class="text-center">:</td>
                    <th><x-status :status="$branch->status" /></th>
                </tr>
            </x-table>
        </div>
    </div>
    <a href="{{ route('hospital-branch.index') }}" class="btn btn-outline-dark">Back</a>
@endsection


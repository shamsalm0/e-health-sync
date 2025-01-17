@extends('layouts.master')
@section('title')
   Test Group Details
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Diagnosis
        @endslot
        @slot('li2')
            Test Group
        @endslot
        @slot('li2Url')
            test-group.index
        @endslot
        @slot('title')
            Test Group Details
        @endslot
    @endcomponent
    <div class="card">
        <div class="card-body">
            <x-table class="table mb-0">
                <tr>
                    <td width="160">Machine Name</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $testGroup->name }}</th>
                </tr>
                <tr>
                    <td width="160">Description</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $testGroup->description }}</th>
                </tr>
                <tr>
                    <td width="160">Is Roman</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $testGroup->is_roman }}</th>
                </tr>
                <tr>
                    <td width="160">Status</td>
                    <td width="30" class="text-center">:</td>
                    <th><x-status :status="$testGroup->status" /></th>
                </tr>
            </x-table>
        </div>
    </div>
    <a href="{{ route('test-group.index') }}" class="btn btn-outline-dark">Back</a>
@endsection


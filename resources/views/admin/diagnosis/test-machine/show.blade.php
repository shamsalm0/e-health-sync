@extends('layouts.master')
@section('title')
    Show Test Machine
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Test Machine
        @endslot
        @slot('li2')
            List
        @endslot
        @slot('li2Url')
            test-machine.index
        @endslot
        @slot('title')
            Show Test Machine
        @endslot
    @endcomponent
    <div class="card">
        <div class="card-body">
            <x-table class="table mb-0">
                <tr>
                    <td width="160">Test Name Id</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $testMachine->testName?->name }}</th>
                </tr>
                <tr>
                    <td width="160">Machine Id</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $testMachine->machine?->name }}</th>
                </tr>
                <tr>
                    <td width="160">Status</td>
                    <td width="30" class="text-center">:</td>
                    <th><x-status :status="$testMachine->status" /></th>
                </tr>
            </x-table>
        </div>
    </div>
    <a href="{{ route('test-machine.index') }}" class="btn btn-outline-dark">Back</a>
@endsection

@extends('layouts.master')
@section('title')
   Test Attribute Details
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Diagnosis
        @endslot
        @slot('li2')
            Test Attribute
        @endslot
        @slot('li2Url')
            test-attribute.index
        @endslot
        @slot('title')
            Test Attribute Details
        @endslot
    @endcomponent
    <div class="card">
        <div class="card-body">
            <x-table class="table mb-0">
                <tr>
                    <td width="160">Name</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $testAttribute->name }}</th>
                </tr>
                <tr>
                    <td width="160">Status</td>
                    <td width="30" class="text-center">:</td>
                    <th><x-status :status="$testAttribute->status" /></th>
                </tr>
            </x-table>
        </div>
    </div>
    <a href="{{ route('test-attribute.index') }}" class="btn btn-outline-dark">Back</a>
@endsection


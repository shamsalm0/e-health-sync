@extends('layouts.master')
@section('title')
    Show Test Product
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Test Product
        @endslot
        @slot('li2')
            List
        @endslot
        @slot('li2Url')
            test-product.index
        @endslot
        @slot('title')
            Show Test Product
        @endslot
    @endcomponent
    <div class="card">
        <div class="card-body">
            <x-table class="table mb-0">
                <tr>
                    <td width="160">Test Name</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $testProduct->testName?->name }}</th>
                </tr>
                <tr>
                    <td width="160">Store Product</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $testProduct->storeProduct?->name }}</th>
                </tr>
                <tr>
                    <td width="160">Status</td>
                    <td width="30" class="text-center">:</td>
                    <th><x-status :status="$testProduct->status" /></th>
                </tr>
            </x-table>
        </div>
    </div>
    <a href="{{ route('test-product.index') }}" class="btn btn-outline-dark">Back</a>
@endsection

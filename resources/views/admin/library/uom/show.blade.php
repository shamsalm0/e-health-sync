@extends('layouts.master')
@section('title')
    Show UOM
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Library
        @endslot
        @slot('li2')
            Uom List
        @endslot
        @slot('li2Url')
            uom.index
        @endslot
        @slot('title')
        Show UOM Information
        @endslot
    @endcomponent
    <div class="card">
        <div class="card-body">
            <x-table class="table mb-0">
                <tr>
                    <td width="160">Name</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $uom->name }}</th>
                </tr>
                <tr>
                    <td width="160">Details</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $uom->details }}</th>
                </tr>
                <tr>
                    <td width="160">Type</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $uom->type }}</th>
                </tr>
                <tr>
                    <td width="160">Status</td>
                    <td width="30" class="text-center">:</td>
                    <th><x-status :status="$uom->status" /></th>
                </tr>
            </x-table>
        </div>
    </div>
    <a href="{{ route('resource.index') }}" class="btn btn-outline-dark">Back</a>
@endsection

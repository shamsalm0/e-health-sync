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
            Upazila
        @endslot
        @slot('li2Url')
            upazila.index
        @endslot
        @slot('title')
            Upazila Details
        @endslot
    @endcomponent
    <div class="card">
        <div class="card-body">
            <x-table class="table mb-0">
                <tr>
                    <td width="160">Name</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $upazila->name }}</th>
                </tr>
                <tr>
                    <td width="160">Name Bangla</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $upazila->bn_name }}</th>
                </tr>
                <tr>
                    <td width="160">District</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $upazila->district?->name }}</th>
                </tr>
                <tr>
                    <td width="160">Url</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $upazila->url }}</th>
                </tr>
                <tr>
                    <td width="160">Status</td>
                    <td width="30" class="text-center">:</td>
                    <th><x-status :status="$upazila->status" /></th>
                </tr>
            </x-table>
        </div>
    </div>
    <a href="{{ route('upazila.index') }}" class="btn btn-outline-dark">Back</a>
@endsection


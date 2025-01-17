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
            District
        @endslot
        @slot('li2Url')
            district.index
        @endslot
        @slot('title')
            District Details
        @endslot
    @endcomponent
    <div class="card">
        <div class="card-body">
            <x-table class="table mb-0">
                <tr>
                    <td width="160">Name</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $district->name }}</th>
                </tr>
                <tr>
                    <td width="160">Name Bangla</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $district->bn_name }}</th>
                </tr>
                <tr>
                    <td width="160">Division</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $district->division?->name }}</th>
                </tr>
                <tr>
                    <td width="160">Lat</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $district->lat }}</th>
                </tr>
                <tr>
                    <td width="160">Lon</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $district->lon }}</th>
                </tr>
                <tr>
                    <td width="160">Url</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $district->url }}</th>
                </tr>
                <tr>
                    <td width="160">Status</td>
                    <td width="30" class="text-center">:</td>
                    <th><x-status :status="$district->status" /></th>
                </tr>
            </x-table>
        </div>
    </div>
    <a href="{{ route('district.index') }}" class="btn btn-outline-dark">Back</a>
@endsection

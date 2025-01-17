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
            Designations
        @endslot
        @slot('li2Url')
            designation.index
        @endslot
        @slot('title')
            Designation Details
        @endslot
    @endcomponent
    <div class="card">
        <div class="card-body">
            <x-table class="table mb-0">
                <tr>
                    <td width="160">Name</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $designation->name }}</th>
                </tr>
                <tr>
                    <td width="160">Status</td>
                    <td width="30" class="text-center">:</td>
                    <th><x-status :status="$designation->status" /></th>
                </tr>
            </x-table>
        </div>
    </div>
    <a href="{{ route('designation.index') }}" class="btn btn-outline-dark">Back</a>
@endsection


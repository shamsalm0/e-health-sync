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
            Grades
        @endslot
        @slot('li2Url')
            grades.index
        @endslot
        @slot('title')
            Grade Details
        @endslot
    @endcomponent
    <div class="card">
        <div class="card-body">
            <x-table class="table mb-0">
                <tr>
                    <td width="160">Name</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $union->name }}</th>
                </tr>
                <tr>
                    <td width="160">Name Bangla</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $union->bn_name }}</th>
                </tr>
                <tr>
                    <td width="160">Upazila</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $union->upazila?->name }}</th>
                </tr>
                <tr>
                    <td width="160">Url</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $union->url }}</th>
                </tr>
                <tr>
                    <td width="160">Status</td>
                    <td width="30" class="text-center">:</td>
                    <th><x-status :status="$union->status" /></th>
                </tr>
            </x-table>
        </div>
    </div>
    <a href="{{ route('union.index') }}" class="btn btn-outline-dark">Back</a>
@endsection


@extends('layouts.master')
@section('title')
    Show Blood Group
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Library
        @endslot
        @slot('li2')
            Blood Group List
        @endslot
        @slot('li2Url')
            blood-group.index
        @endslot
        @slot('title')
            Show Blood Group
        @endslot
    @endcomponent
    <div class="card">
        <div class="card-body">
            <x-table class="table mb-0">
                <tr>
                    <td width="160">Name</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $bloodGroup->name }}</th>
                </tr>
                <tr>
                    <td width="160">Status</td>
                    <td width="30" class="text-center">:</td>
                    <th><x-status :status="$bloodGroup->status" /></th>
                </tr>
            </x-table>
        </div>
    </div>
    <a href="{{ route('blood-group.index') }}" class="btn btn-outline-dark">Back</a>
@endsection

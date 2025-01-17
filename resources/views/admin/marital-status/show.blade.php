@extends('layouts.master')
@section('title')
    Show Marital Status
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Marital Status
        @endslot
        @slot('li2')
            List
        @endslot
        @slot('li2Url')
            marital-status.index
        @endslot
        @slot('title')
            Show Marital Status
        @endslot
    @endcomponent
    <div class="card">
        <div class="card-body">
            <x-table class="table mb-0">
                <tr>
                    <td width="160">Name</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $maritalStatus->name }}</th>
                </tr>
                <tr>
                    <td width="160">Status</td>
                    <td width="30" class="text-center">:</td>
                    <th><x-status :status="$maritalStatus->status" /></th>
                </tr>
            </x-table>
        </div>
    </div>
    <a href="{{ route('marital-status.index') }}" class="btn btn-outline-dark">Back</a>
@endsection

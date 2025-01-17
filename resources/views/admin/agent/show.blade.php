@extends('layouts.master')
@section('title')
    Show Agent
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Agent
        @endslot
        @slot('li2')
            List
        @endslot
        @slot('li2Url')
            agent.index
        @endslot
        @slot('title')
            Show Agent
        @endslot
    @endcomponent
    <div class="card">
        <div class="card-body">
            <x-table class="table mb-0">
                <tr>
                    <td width="160">Name</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $agent->name }}</th>
                </tr>
                <tr>
                    <td width="160">Mobile</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $agent->mobile }}</th>
                </tr>
                <tr>
                    <td width="160">Address</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $agent->address }}</th>
                </tr>
                <tr>
                    <td width="160">Status</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $agent->status }}</th>
                </tr>
            </x-table>
        </div>
    </div>
    <a href="{{ route('agent.index') }}" class="btn btn-outline-dark">Back</a>
@endsection
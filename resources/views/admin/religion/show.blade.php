@extends('layouts.master')
@section('title')
    Show Religion
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Religion
        @endslot
        @slot('li2')
            List
        @endslot
        @slot('li2Url')
            religion.index
        @endslot
        @slot('title')
            Show Religion
        @endslot
    @endcomponent
    <div class="card">
        <div class="card-body">
            <x-table class="table mb-0">
                <tr>
                    <td width="160">Name</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $religion->name }}</th>
                </tr>
                <tr>
                    <td width="160">Status</td>
                    <td width="30" class="text-center">:</td>
                    <th><x-status :status="$religion->status" /></th>
                </tr>
            </x-table>
        </div>
    </div>
    <a href="{{ route('religion.index') }}" class="btn btn-outline-dark">Back</a>
@endsection
@extends('layouts.master')
@section('title')
    Show Gender
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Gender
        @endslot
        @slot('li2')
            List
        @endslot
        @slot('li2Url')
            gender.index
        @endslot
        @slot('title')
            Show Gender
        @endslot
    @endcomponent
    <div class="card">
        <div class="card-body">
            <x-table class="table mb-0">
                <tr>
                    <td width="160">Name</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $gender->name }}</th>
                </tr>
                <tr>
                    <td width="160">Status</td>
                    <td width="30" class="text-center">:</td>
                    <th><x-status :status="$gender->status" /></th>
                </tr>
            </x-table>
        </div>
    </div>
    <a href="{{ route('gender.index') }}" class="btn btn-outline-dark">Back</a>
@endsection

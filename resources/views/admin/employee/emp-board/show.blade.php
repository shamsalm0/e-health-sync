@extends('layouts.master')
@section('title')
    Show Emp Board
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Emp Board
        @endslot
        @slot('li2')
            List
        @endslot
        @slot('li2Url')
            emp-board.index
        @endslot
        @slot('title')
            Show Emp Board
        @endslot
    @endcomponent
    <div class="card">
        <div class="card-body">
            <x-table class="table mb-0">
                <tr>
                    <td width="160">Name</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $empBoard->name }}</th>
                </tr>
                <tr>
                    <td width="160">Is Board</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $empBoard->is_board }}</th>
                </tr>
                <tr>
                    <td width="160">Status</td>
                    <td width="30" class="text-center">:</td>
                    <th><x-status :status="$empBoard->status" /></th>
                </tr>
            </x-table>
        </div>
    </div>
    <a href="{{ route('emp-board.index') }}" class="btn btn-outline-dark">Back</a>
@endsection

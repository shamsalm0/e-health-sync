@extends('layouts.master')
@section('title')
   Machine Details
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Diagnosis
        @endslot
        @slot('li2')
            Machine
        @endslot
        @slot('li2Url')
            machine.index
        @endslot
        @slot('title')
            Machine Details
        @endslot
    @endcomponent
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Machine Details</h5>
        </div>
        <div class="card-body">
            <h5 class="card-text">{{ $machine->name }}</h5>
            <p class="card-text"><strong>Description:</strong> {{ $machine->description }}</p>
            <p class="card-text"><strong>Status:</strong> {{ $machine->status == 1 ? 'Inactive' : 'Active' }}</p>
            <p class="card-text"><strong>Created At:</strong> {{ $machine->created_at?->format('F j, Y, g:i a') }}</p>
            <p class="card-text"><strong>Updated At:</strong> {{ $machine->updated_at?->format('F j, Y, g:i a') }}</p>

            <a href="{{ route('machine.index') }}" class="btn btn-sm btn-primary">Back to List</a>
        </div>
    </div>
@endsection

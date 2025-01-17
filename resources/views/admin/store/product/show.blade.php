@extends('layouts.master')
@section('title')
    Department Details
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Library
        @endslot
        @slot('li2')
            Departments
        @endslot
        @slot('li2Url')
            department.index
        @endslot
        @slot('title')
            Department Details
        @endslot
    @endcomponent
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Department Details</h5>
        </div>
        <div class="card-body">
            <h5 class="card-text">{{ $department->name }}</h5>
            <p class="card-text"><strong>Code:</strong> {{ $department->code }}</p>
            <p class="card-text"><strong>Phone:</strong> {{ $department->phone }}</p>
            <p class="card-text"><strong>Email:</strong> {{ $department->email }}</p>
            <p class="card-text"><strong>Status:</strong> {{ $department->status == 1 ? 'Inactive' : 'Active' }}</p>
            <p class="card-text"><strong>Created At:</strong> {{ $department->created_at?->format('F j, Y, g:i a') }}</p>
            <p class="card-text"><strong>Updated At:</strong> {{ $department->updated_at?->format('F j, Y, g:i a') }}</p>

            <a href="{{ route('grades.index') }}" class="btn btn-sm btn-primary">Back to List</a>
        </div>
    </div>
@endsection


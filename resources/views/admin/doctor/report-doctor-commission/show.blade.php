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
        <div class="card-header">
            <h5 class="card-title mb-0">Grade Details</h5>
        </div>
        <div class="card-body">
            <h5 class="card-text">{{ $grade->name }}</h5>
            <p class="card-text"><strong>Description:</strong> {{ $grade->description }}</p>
            <p class="card-text"><strong>Status:</strong> {{ $grade->status == 1 ? 'Inactive' : 'Active' }}</p>
            <p class="card-text"><strong>Created At:</strong> {{ $grade->created_at?->format('F j, Y, g:i a') }}</p>
            <p class="card-text"><strong>Updated At:</strong> {{ $grade->updated_at?->format('F j, Y, g:i a') }}</p>

            <a href="{{ route('grades.index') }}" class="btn btn-sm btn-primary">Back to List</a>
        </div>
    </div>
@endsection


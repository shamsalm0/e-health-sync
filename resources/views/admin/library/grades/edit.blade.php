@extends('layouts.master')
@section('title')
    Update Grade
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
            Update Grade
        @endslot
    @endcomponent
    <x-alert />
    <form method="POST" action="{{ route('grades.update', $grade->id) }}" role="form" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        @include('admin.library.grades.form')
    </form>
@endsection

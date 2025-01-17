@extends('layouts.master')
@section('title')
    Create Grade
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
            Create Grade
        @endslot
    @endcomponent
    <form method="POST" action="{{ route('grades.store') }}" role="form" enctype="multipart/form-data">
        @csrf
        @include('admin.library.grades.form')
    </form>
@endsection

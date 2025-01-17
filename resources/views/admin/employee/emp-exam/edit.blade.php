@extends('layouts.master')

@section('title')
    Update Emp Exam
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Emp Exam
        @endslot
        @slot('li2')
            List
        @endslot
        @slot('li2Url')
            emp-exam.index
        @endslot
        @slot('title')
            Update Emp Exam
        @endslot
    @endcomponent

    <form action="{{ route('emp-exam.update', $empExam->id) }}" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.employee.emp-exam.form')

    </form>
@endsection

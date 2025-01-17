@extends('layouts.master')

@section('title')
        Create Emp Exam
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
            Create Emp Exam
        @endslot
    @endcomponent

    <form action="{{ route('emp-exam.store') }}" method="POST"  role="form" enctype="multipart/form-data">
        @csrf

        @include('admin.employee.emp-exam.form')

    </form>
@endsection

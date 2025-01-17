@extends('layouts.master')
@section('title')
    Create Test Name
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Diagnosis
        @endslot
        @slot('li2')
            Test Name
        @endslot
        @slot('li2Url')
            test-name.index
        @endslot
        @slot('title')
            Create Test Name
        @endslot
    @endcomponent
    <form method="POST" action="{{ route('test-name.store') }}" role="form" enctype="multipart/form-data">
        @csrf
        @include('admin.diagnosis.test-name.form')
    </form>
@endsection


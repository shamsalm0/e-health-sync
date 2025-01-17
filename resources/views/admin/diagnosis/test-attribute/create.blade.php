@extends('layouts.master')
@section('title')
    Create Test Attribute
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Diagnosis
        @endslot
        @slot('li2')
            Test Attribute
        @endslot
        @slot('li2Url')
            test-attribute.index
        @endslot
        @slot('title')
            Create Test Attribute
        @endslot
    @endcomponent
    <form method="POST" action="{{ route('test-attribute.store') }}" role="form" enctype="multipart/form-data">
        @csrf
        @include('admin.diagnosis.test-attribute.form')
    </form>
@endsection


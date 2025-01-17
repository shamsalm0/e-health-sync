@extends('layouts.master')
@section('title')
    Update Test Name
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
            Update Test Name
        @endslot
    @endcomponent
    @include('component.alert')
    <form method="POST" action="{{ route('test-name.update', $test_name->id) }}" role="form" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        @include('admin.diagnosis.test-name.form')
    </form>
@endsection


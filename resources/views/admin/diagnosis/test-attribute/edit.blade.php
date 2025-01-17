@extends('layouts.master')
@section('title')
    Update Test Attribute
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
            Update Test Attribute
        @endslot
    @endcomponent
    @include('component.alert')
    <form method="POST" action="{{ route('test-attribute.update', $test_attribute->id) }}" role="form" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        @include('admin.diagnosis.test-attribute.form')
    </form>
@endsection


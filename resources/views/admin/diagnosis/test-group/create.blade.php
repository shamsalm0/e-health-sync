@extends('layouts.master')
@section('title')
    Create Test Group
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Diagnosis
        @endslot
        @slot('li2')
            Test Group
        @endslot
        @slot('li2Url')
            test-group.index
        @endslot
        @slot('title')
            Create Test Group
        @endslot
    @endcomponent
    <form method="POST" action="{{ route('test-group.store') }}" role="form" enctype="multipart/form-data">
        @csrf
        @include('admin.diagnosis.test-group.form')
    </form>
@endsection


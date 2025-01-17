@extends('layouts.master')
@section('title')
    Update Test Group
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
            Update Test Group
        @endslot
    @endcomponent
    @include('component.alert')
    <form method="POST" action="{{ route('test-group.update', $test_group->id) }}" role="form" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        @include('admin.diagnosis.test-group.form')
    </form>
@endsection


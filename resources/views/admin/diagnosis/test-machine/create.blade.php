@extends('layouts.master')

@section('title')
        Create Test Machine
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Test Machine
        @endslot
        @slot('li2')
            List
        @endslot
        @slot('li2Url')
            test-machine.index
        @endslot
        @slot('title')
            Create Test Machine
        @endslot
    @endcomponent

    <form action="{{ route('test-machine.store') }}" method="POST"  role="form" enctype="multipart/form-data">
        @csrf
        @include('admin.diagnosis.test-machine.form')
    </form>
@endsection

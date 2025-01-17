@extends('layouts.master')

@section('title')
    Update Test Machine
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
            Update Test Machine
        @endslot
    @endcomponent

    <form action="{{ route('test-machine.update', $testMachine->id) }}" method="POST" role="form"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.diagnosis.test-machine.form')

    </form>
@endsection

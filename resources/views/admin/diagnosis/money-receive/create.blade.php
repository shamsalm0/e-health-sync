@extends('layouts.master')
@section('title')
    Create Machine
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Diagnosis
        @endslot
        @slot('li2')
            Machine
        @endslot
        @slot('li2Url')
            machine.index
        @endslot
        @slot('title')
            Create Machine
        @endslot
    @endcomponent
    <form method="POST" action="{{ route('machine.store') }}" role="form" enctype="multipart/form-data">
        @csrf
        @include('admin.diagnosis.machine.form')
    </form>
@endsection

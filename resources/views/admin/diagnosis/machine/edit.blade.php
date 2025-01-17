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
            Update Machine
        @endslot
    @endcomponent
    @include('component.alert')
    <form method="POST" action="{{ route('machine.update', $machine->id) }}" role="form" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        @include('admin.diagnosis.machine.form')
    </form>
@endsection

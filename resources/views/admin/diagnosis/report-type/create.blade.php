@extends('layouts.master')
@section('title')
    Create Report Type
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Diagnosis
        @endslot
        @slot('li2')
            Report Type
        @endslot
        @slot('li2Url')
            report-type.index
        @endslot
        @slot('title')
            Create Report Type
        @endslot
    @endcomponent
    <form method="POST" action="{{ route('report-type.store') }}" role="form" enctype="multipart/form-data">
        @csrf
        @include('admin.diagnosis.report-type.form')
    </form>
@endsection


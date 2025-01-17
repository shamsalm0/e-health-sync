@extends('layouts.master')
@section('title')
    Update Report Type
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
            Update Report Type
        @endslot
    @endcomponent
    @include('component.alert')
    <form method="POST" action="{{ route('report-type.update', $report_type->id) }}" role="form" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        @include('admin.diagnosis.report-type.form')
    </form>
@endsection


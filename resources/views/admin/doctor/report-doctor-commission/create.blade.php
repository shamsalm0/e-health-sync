@extends('layouts.master')
@section('title')
    Create Report Doctor Commission
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Doctor
        @endslot
        @slot('li2')
            Doctor Commission List
        @endslot
        @slot('li2Url')
            test-name.index
        @endslot
        @slot('title')
            Create Report Doctor Commission
        @endslot
    @endcomponent

    @livewire('admin.doctor.report-doctor-commission')

@endsection

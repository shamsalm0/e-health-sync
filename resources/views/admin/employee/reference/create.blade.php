@extends('layouts.master')

@section('title')
        Create Reference
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Reference
        @endslot
        @slot('li2')
            List
        @endslot
        @slot('li2Url')
            reference.index
        @endslot
        @slot('title')
            Create Reference
        @endslot
    @endcomponent

    <form action="{{ route('reference.store') }}" method="POST"  role="form" enctype="multipart/form-data">
        @csrf

        @include('admin.employee.reference.form')

    </form>
@endsection

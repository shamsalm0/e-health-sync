@extends('layouts.master')
@section('title')
    Update Designation
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Library
        @endslot
        @slot('li2')
            Designation
        @endslot
        @slot('li2Url')
            designation.index
        @endslot
        @slot('title')
            Update Designation
        @endslot
    @endcomponent
    <x-alert />
    <form method="POST" action="{{ route('designation.update', $designation->id) }}" role="form"
        enctype="multipart/form-data">
        @method('PUT')
        @csrf
        @include('admin.library.designation.form')
    </form>
@endsection


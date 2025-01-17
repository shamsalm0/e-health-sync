@extends('layouts.master')
@section('title')
    Create Designation
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
            Create Designation
        @endslot
    @endcomponent
    <form method="POST" action="{{ route('designation.store') }}" role="form" enctype="multipart/form-data">
        @csrf
        @include('admin.library.designation.form')
    </form>
@endsection


@extends('layouts.master')
@section('title')
    Update Grade
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Library
        @endslot
        @slot('li2')
            Hospital
        @endslot
        @slot('li2Url')
            hospital.index
        @endslot
        @slot('title')
            Update Hospital
        @endslot
    @endcomponent
    <x-alert />
    <form method="POST" action="{{ route('hospital-branch.update', $branch->id) }}" role="form"
        enctype="multipart/form-data">
        @method('PUT')
        @csrf
        @include('admin.library.hospital-branch.form')
    </form>
@endsection


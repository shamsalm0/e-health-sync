@extends('layouts.master')
@section('title')
    Update Specialization
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Library
        @endslot
        @slot('li2')
            Specialization
        @endslot
        @slot('li2Url')
            specialization.index
        @endslot
        @slot('title')
            Update Specialization
        @endslot
    @endcomponent
    <x-alert />
    <form method="POST" action="{{ route('specialization.update', $specialization->id) }}" role="form"
        enctype="multipart/form-data">
        @method('PUT')
        @csrf
        @include('admin.library.specialization.form')
    </form>
@endsection


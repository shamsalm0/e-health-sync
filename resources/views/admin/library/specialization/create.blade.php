@extends('layouts.master')
@section('title')
    Create Specialization
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
            Create Specialization
        @endslot
    @endcomponent
    <form method="POST" action="{{ route('specialization.store') }}" role="form" enctype="multipart/form-data">
        @csrf
        @include('admin.library.specialization.form')
    </form>
@endsection


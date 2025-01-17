@extends('layouts.master')
@section('title')
    Create Grade
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
            Create Hospital
        @endslot
    @endcomponent
    <form method="POST" action="{{ route('hospital.store') }}" role="form" enctype="multipart/form-data">
        @csrf
        @include('admin.library.hospital.form')
    </form>
@endsection


@extends('layouts.master')
@section('title')
    Update Hospital Floor
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Library
        @endslot
        @slot('li2')
            Hospital Floor
        @endslot
        @slot('li2Url')
            hospital-floor.index
        @endslot
        @slot('title')
            Update Hospital Floor
        @endslot
    @endcomponent
    <x-alert />
    <form method="POST" action="{{ route('hospital-floor.update', $hospital_floor->id) }}" role="form"
        enctype="multipart/form-data">
        @method('PUT')
        @csrf
        @include('admin.library.hospital-floor.form')
    </form>
@endsection


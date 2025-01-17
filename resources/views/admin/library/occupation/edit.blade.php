@extends('layouts.master')
@section('title')
    Update Occupation
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Library
        @endslot
        @slot('li2')
            Occupation
        @endslot
        @slot('li2Url')
            occupation.index
        @endslot
        @slot('title')
            Update Occupation
        @endslot
    @endcomponent
    <x-alert />
    <form method="POST" action="{{ route('occupation.update', $occupation->id) }}" role="form"
        enctype="multipart/form-data">
        @method('PUT')
        @csrf
        @include('admin.library.occupation.form')
    </form>
@endsection


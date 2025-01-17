@extends('layouts.master')

@section('title')
    Create Gender
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Library
        @endslot
        @slot('li2')
            Gender
        @endslot
        @slot('li2Url')
            gender.index
        @endslot
        @slot('title')
            Create Gender
        @endslot
    @endcomponent

    <form action="{{ route('gender.store') }}" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        @include('admin.library.gender.form')
    </form>
@endsection

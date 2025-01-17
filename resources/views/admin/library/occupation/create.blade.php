@extends('layouts.master')
@section('title')
    Create Occupation
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
            Create Occupation
        @endslot
    @endcomponent
    <form method="POST" action="{{ route('occupation.store') }}" role="form" enctype="multipart/form-data">
        @csrf
        @include('admin.library.occupation.form')
    </form>
@endsection


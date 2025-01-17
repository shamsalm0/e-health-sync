@extends('layouts.master')
@section('title')
    Create Division
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Library
        @endslot
        @slot('li2')
            Division
        @endslot
        @slot('li2Url')
            division.index
        @endslot
        @slot('title')
            Create Division
        @endslot
    @endcomponent
    <form method="POST" action="{{ route('division.store') }}" role="form" enctype="multipart/form-data">
        @csrf
        @include('admin.library.division.form')
    </form>
@endsection


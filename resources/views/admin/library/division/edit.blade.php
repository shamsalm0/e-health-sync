@extends('layouts.master')
@section('title')
    Update Division
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
            Update Division
        @endslot
    @endcomponent
    <x-alert />
    <form method="POST" action="{{ route('division.update', $division->id) }}" role="form" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        @include('admin.library.division.form')
    </form>
@endsection
@section('script')
@endsection

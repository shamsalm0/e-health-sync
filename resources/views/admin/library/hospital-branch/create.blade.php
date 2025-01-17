@extends('layouts.master')
@section('title')
    Create Branch
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Library
        @endslot
        @slot('li2')
            Hospital Branch
        @endslot
        @slot('li2Url')
            hospital-branch.index
        @endslot
        @slot('title')
            Create Branch
        @endslot
    @endcomponent
    <form method="POST" action="{{ route('hospital-branch.store') }}" role="form" enctype="multipart/form-data">
        @csrf
        @include('admin.library.hospital-branch.form')
    </form>
@endsection


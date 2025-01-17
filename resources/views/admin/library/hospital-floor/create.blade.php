@extends('layouts.master')
@section('title')
    Create Hospital Floor
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
            Create Hospital Floor
        @endslot
    @endcomponent
    <form method="POST" action="{{ route('hospital-floor.store') }}" role="form" enctype="multipart/form-data">
        @csrf
        @include('admin.library.hospital-floor.form')
    </form>
@endsection


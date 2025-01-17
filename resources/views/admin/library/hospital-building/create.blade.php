@extends('layouts.master')
@section('title')
    Create Building
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Library
        @endslot
        @slot('li2')
            Hospital Building
        @endslot
        @slot('li2Url')
            hospital-building.index
        @endslot
        @slot('title')
            Create Building
        @endslot
    @endcomponent
    <form method="POST" action="{{ route('hospital-building.store') }}" role="form" enctype="multipart/form-data">
        @csrf
        @include('admin.library.hospital-building.form')
    </form>
@endsection


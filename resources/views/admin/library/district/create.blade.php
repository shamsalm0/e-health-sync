@extends('layouts.master')
@section('title')
    Create District
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Library
        @endslot
        @slot('li2')
            District
        @endslot
        @slot('li2Url')
            district.index
        @endslot
        @slot('title')
            Create District
        @endslot
    @endcomponent
    <form method="POST" action="{{ route('district.store') }}" role="form" enctype="multipart/form-data">
        @csrf
        @include('admin.library.district.form')
    </form>
@endsection


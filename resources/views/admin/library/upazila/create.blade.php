@extends('layouts.master')
@section('title')
    Create Upazila
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Library
        @endslot
        @slot('li2')
            Upazila
        @endslot
        @slot('li2Url')
            upazila.index
        @endslot
        @slot('title')
            Create Upazila
        @endslot
    @endcomponent
    <form method="POST" action="{{ route('upazila.store') }}" role="form" enctype="multipart/form-data">
        @csrf
        @include('admin.library.upazila.form')
    </form>
@endsection


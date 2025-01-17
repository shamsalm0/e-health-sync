@extends('layouts.master')
@section('title')
    Update District
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
            Update District
        @endslot
    @endcomponent
    <x-alert />
    <form method="POST" action="{{ route('district.update', $district->id) }}" role="form" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        @include('admin.library.district.form')
    </form>
@endsection
@section('script')
@endsection

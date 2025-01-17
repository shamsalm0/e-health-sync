@extends('layouts.master')
@section('title')
    Update upazila
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Library
        @endslot
        @slot('li2')
            upazila
        @endslot
        @slot('li2Url')
            upazila.index
        @endslot
        @slot('title')
            Update Upazila
        @endslot
    @endcomponent
    <x-alert />
    <form method="POST" action="{{ route('upazila.update', $upazila->id) }}" role="form" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        @include('admin.library.upazila.form')
    </form>
@endsection
@section('script')
@endsection

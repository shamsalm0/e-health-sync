@extends('layouts.master')
@section('title')
    Update Union
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Library
        @endslot
        @slot('li2')
            Union
        @endslot
        @slot('li2Url')
            union.index
        @endslot
        @slot('title')
            Update Union
        @endslot
    @endcomponent
    <x-alert />
    <form method="POST" action="{{ route('union.update', $union->id) }}" role="form" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        @include('admin.library.union.form')
    </form>
@endsection
@section('script')
@endsection

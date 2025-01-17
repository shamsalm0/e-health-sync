@extends('layouts.master')
@section('title')
    Create Union
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
            Create Union
        @endslot
    @endcomponent
    <form method="POST" action="{{ route('union.store') }}" role="form" enctype="multipart/form-data">
        @csrf
        @include('admin.library.union.form')
    </form>
@endsection


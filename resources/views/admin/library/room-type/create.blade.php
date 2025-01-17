@extends('layouts.master')
@section('title')
    Create Room Type
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Library
        @endslot
        @slot('li2')
            Room Type
        @endslot
        @slot('li2Url')
            room-type.index
        @endslot
        @slot('title')
            Create Room Type
        @endslot
    @endcomponent
    <form method="POST" action="{{ route('room-type.store') }}" role="form" enctype="multipart/form-data">
        @csrf
        @include('admin.library.room-type.form')
    </form>
@endsection


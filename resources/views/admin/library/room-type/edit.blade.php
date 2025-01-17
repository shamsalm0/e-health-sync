@extends('layouts.master')
@section('title')
    Update Room Type
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
            Update Room Type
        @endslot
    @endcomponent
    <x-alert />
    <form method="POST" action="{{ route('room-type.update', $room_type->id) }}" role="form" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        @include('admin.library.room-type.form')
    </form>
@endsection


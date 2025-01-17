@extends('layouts.master')
@section('title')
    Update Hospital Room
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Library
        @endslot
        @slot('li2')
            Hospital Room
        @endslot
        @slot('li2Url')
            hospital-room.index
        @endslot
        @slot('title')
            Update Hospital Room
        @endslot
    @endcomponent
    <x-alert />
    <form method="POST" action="{{ route('hospital-room.update', $hospital_room->id) }}" role="form"
        enctype="multipart/form-data">
        @method('PUT')
        @csrf
        @include('admin.library.hospital-room.form')
    </form>
@endsection


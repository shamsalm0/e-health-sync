@extends('layouts.master')
@section('title')
    Create Hospital Room
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
            Create Hospital Room
        @endslot
    @endcomponent
    <form method="POST" action="{{ route('hospital-room.store') }}" role="form" enctype="multipart/form-data">
        @csrf
        @include('admin.library.hospital-room.form')
    </form>
@endsection


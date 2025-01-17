@extends('layouts.master')
@section('title')
    Update Shift
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Library
        @endslot
        @slot('li2')
            Shift
        @endslot
        @slot('li2Url')
            shift.index
        @endslot
        @slot('title')
            Update Shift
        @endslot
    @endcomponent
    <x-alert />
    <form method="POST" action="{{ route('shift.update', $shift->id) }}" role="form" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        @include('admin.library.shift.form')
    </form>
@endsection


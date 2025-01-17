@extends('layouts.master')
@section('title')
    Create Shift
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
            Create Shift
        @endslot
    @endcomponent
    <form method="POST" action="{{ route('shift.store') }}" role="form" enctype="multipart/form-data">
        @csrf
        @include('admin.library.shift.form')
    </form>
@endsection


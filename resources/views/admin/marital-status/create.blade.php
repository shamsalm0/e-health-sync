@extends('layouts.master')

@section('title')
    Create Marital Status
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Library
        @endslot
        @slot('li2')
            Marital Status
        @endslot
        @slot('li2Url')
            marital-status.index
        @endslot
        @slot('title')
            Create Marital Status
        @endslot
    @endcomponent

    <form action="{{ route('marital-status.store') }}" method="POST" role="form" enctype="multipart/form-data">
        @csrf

        @include('admin.marital-status.form')

    </form>
@endsection

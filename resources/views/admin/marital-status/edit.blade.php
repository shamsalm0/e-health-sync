@extends('layouts.master')

@section('title')
    Update Marital Status
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
            Update Marital Status
        @endslot
    @endcomponent

    <form action="{{ route('marital-status.update', $maritalStatus->id) }}" method="POST" role="form"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.marital-status.form')

    </form>
@endsection

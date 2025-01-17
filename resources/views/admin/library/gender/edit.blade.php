@extends('layouts.master')

@section('title')
    Update Gender
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Gender
        @endslot
        @slot('li2')
            List
        @endslot
        @slot('li2Url')
            gender.index
        @endslot
        @slot('title')
            Update Gender
        @endslot
    @endcomponent

    <form action="{{ route('gender.update', $gender->id) }}" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.library.gender.form')

    </form>
@endsection

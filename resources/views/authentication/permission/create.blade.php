@extends('layouts.master')
@section('title')
    Create Permission
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Library
        @endslot
        @slot('li2')
            Permissions
        @endslot
        @slot('li2Url')
            permission.index
        @endslot
        @slot('title')
            Create Permission
        @endslot
    @endcomponent
    <x-alert />
    <form method="POST" action="{{ route('permission.store') }}" role="form" enctype="multipart/form-data">
        @csrf
        @include('authentication.permission.form')
    </form>
@endsection

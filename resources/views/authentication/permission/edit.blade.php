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
            Update Permission
        @endslot
    @endcomponent
    <x-alert />
    <form method="POST" action="{{ route('permission.update', $permission->id) }}" role="form"
        enctype="multipart/form-data">
        @method('PUT')
        @csrf
        @include('authentication.permission.form')
    </form>
@endsection

@extends('layouts.master')
@section('title')
    Create User
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Users
        @endslot
        @slot('li2')
            Users
        @endslot
        @slot('li2Url')
            user.index
        @endslot
        @slot('title')
            Create User
        @endslot
    @endcomponent
    <form method="POST" action="{{ route('user.store') }}" role="form" enctype="multipart/form-data">
        @csrf
        @include('component.alert')
        @include('authentication.user.form')
    </form>
@endsection

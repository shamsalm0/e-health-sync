@extends('layouts.master')
@section('title')
    Update User
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
            Update User
        @endslot
    @endcomponent
    <form method="POST" action="{{ route('user.update', $user->id) }}" role="form" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        @include('component.alert')
        @include('authentication.user.form')
    </form>
@endsection


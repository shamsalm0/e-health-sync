@extends('layouts.master')
@section('title')
    Update Bank
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Library
        @endslot
        @slot('li2')
            Bank
        @endslot
        @slot('li2Url')
            bank.index
        @endslot
        @slot('title')
            Update bank
        @endslot
    @endcomponent
    <x-alert />
    <form method="POST" action="{{ route('bank.update', $bank->id) }}" role="form" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        @include('admin.library.bank.form')
    </form>
@endsection


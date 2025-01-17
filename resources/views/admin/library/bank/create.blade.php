@extends('layouts.master')
@section('title')
    Create Bank
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
            Create Bank
        @endslot
    @endcomponent
    <form method="POST" action="{{ route('bank.store') }}" role="form" enctype="multipart/form-data">
        @csrf
        @include('admin.library.bank.form')
    </form>
@endsection


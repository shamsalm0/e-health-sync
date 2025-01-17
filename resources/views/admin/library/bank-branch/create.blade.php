@extends('layouts.master')
@section('title')
    Create Bank Branch
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Library
        @endslot
        @slot('li2')
            Bank Branch
        @endslot
        @slot('li2Url')
            bank-branch.index
        @endslot
        @slot('title')
            Create Bank Branch
        @endslot
    @endcomponent
    <form method="POST" action="{{ route('bank-branch.store') }}" role="form" enctype="multipart/form-data">
        @csrf
        @include('admin.library.bank-branch.form')
    </form>
@endsection


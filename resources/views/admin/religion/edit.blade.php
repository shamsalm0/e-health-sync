@extends('layouts.master')

@section('title')
        Update Religion
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Religion
        @endslot
        @slot('li2')
            List
        @endslot
        @slot('li2Url')
            religion.index
        @endslot
        @slot('title')
            Update Religion
        @endslot
    @endcomponent

    <form action="{{ route('religion.update', $religion->id) }}" method="POST"  role="form" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.religion.form')
             
    </form>
@endsection

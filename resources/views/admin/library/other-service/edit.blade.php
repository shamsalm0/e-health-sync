@extends('layouts.master')

@section('title')
        Update Other Service
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Other Service
        @endslot
        @slot('li2')
            List
        @endslot
        @slot('li2Url')
            other-service.index
        @endslot
        @slot('title')
            Update Other Service
        @endslot
    @endcomponent

    <form action="{{ route('other-service.update', $otherService->id) }}" method="POST"  role="form" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.library.other-service.form')
             
    </form>
@endsection

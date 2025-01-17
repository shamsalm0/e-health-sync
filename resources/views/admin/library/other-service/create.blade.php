@extends('layouts.master')

@section('title')
        Create Other Service
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
            Create Other Service
        @endslot
    @endcomponent

    <form action="{{ route('other-service.store') }}" method="POST"  role="form" enctype="multipart/form-data">
        @csrf

        @include('admin.library.other-service.form') 
               
    </form>
@endsection

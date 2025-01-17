@extends('layouts.master')

@section('title')
        Create Resource
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Resource
        @endslot
        @slot('li2')
            List
        @endslot
        @slot('li2Url')
            resource.index
        @endslot
        @slot('title')
            Create Resource
        @endslot
    @endcomponent

    <form action="{{ route('resource.store') }}" method="POST"  role="form" enctype="multipart/form-data">
        @csrf

        @include('admin.resource.form') 
               
    </form>
@endsection

@extends('layouts.master')

@section('title')
        Update Resource
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
            Update Resource
        @endslot
    @endcomponent

    <form action="{{ route('resource.update', $resource->id) }}" method="POST"  role="form" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.resource.form')
             
    </form>
@endsection

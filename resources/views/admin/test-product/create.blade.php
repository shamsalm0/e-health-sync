@extends('layouts.master')

@section('title')
        Create Test Product
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Test Product
        @endslot
        @slot('li2')
            List
        @endslot
        @slot('li2Url')
            test-product.index
        @endslot
        @slot('title')
            Create Test Product
        @endslot
    @endcomponent

    <form action="{{ route('test-product.store') }}" method="POST"  role="form" enctype="multipart/form-data">
        @csrf

        @include('admin.test-product.form') 
               
    </form>
@endsection

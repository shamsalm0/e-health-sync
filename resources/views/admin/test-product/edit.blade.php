@extends('layouts.master')

@section('title')
        Update Test Product
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
            Update Test Product
        @endslot
    @endcomponent

    <form action="{{ route('test-product.update', $testProduct->id) }}" method="POST"  role="form" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.test-product.form')
             
    </form>
@endsection

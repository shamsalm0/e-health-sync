@extends('layouts.master')
@section('title')
    Create Product Category
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Store
        @endslot
        @slot('li2')
            Product Category
        @endslot
        @slot('li2Url')
            store.product-category.index
        @endslot
        @slot('title')
            Create Product Category
        @endslot
    @endcomponent
    <form method="POST" action="{{ route('store.product-category.store') }}" role="form" enctype="multipart/form-data">
        @csrf
        @include('admin.store.product-category.form')
    </form>
@endsection


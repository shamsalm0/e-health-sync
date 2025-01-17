@extends('layouts.master')
@section('title')
    Update Product
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Store
        @endslot
        @slot('li2')
            Product
        @endslot
        @slot('li2Url')
        store.product.index
        @endslot
        @slot('title')
            Update Product
        @endslot
    @endcomponent
    @include('component.alert')
    <form method="POST" action="{{ route('store.product.update', $product->id) }}" role="form" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        @include('admin.store.product.form')
    </form>
@endsection



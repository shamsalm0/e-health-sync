@extends('layouts.master')
@section('title')
    Create Product
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
            Create Product
        @endslot
    @endcomponent
    <form method="POST" action="{{ route('store.product.store') }}" role="form" enctype="multipart/form-data">
        @csrf
        @include('admin.store.product.form')
    </form>
@endsection


@extends('layouts.master')
@section('title')
    Update Product Category
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
            Update Product Category
        @endslot
    @endcomponent
    @include('component.alert')
    <form method="POST" action="{{ route('bank-branch.update', $bankBranch->id) }}" role="form"
        enctype="multipart/form-data">
        @method('PUT')
        @csrf
        @include('admin.library.bank-branch.form')
    </form>
@endsection

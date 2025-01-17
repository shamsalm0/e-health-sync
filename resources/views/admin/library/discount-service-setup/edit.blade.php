@extends('layouts.master')

@section('title')
        Update Discount Service Setup
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Discount Service Setup
        @endslot
        @slot('li2')
            List
        @endslot
        @slot('li2Url')
            discount-service-setup.index
        @endslot
        @slot('title')
            Update Discount Service Setup
        @endslot
    @endcomponent

    <form action="{{ route('discount-service-setup.update', $discountServiceSetup->id) }}" method="POST"  role="form" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.library.discount-service-setup.form')
             
    </form>
@endsection

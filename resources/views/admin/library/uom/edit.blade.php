@extends('layouts.master')
@section('title')
    Create Grade
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Library
        @endslot
        @slot('li2')
            Uom
        @endslot
        @slot('li2Url')
            uom.index
        @endslot
        @slot('title')
            Update Uom
        @endslot
    @endcomponent
    <form method="POST" action="{{ route('uom.update', $uom->id) }}" role="form" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        @include('admin.library.uom.form')
    </form>
@endsection

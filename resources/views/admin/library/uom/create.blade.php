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
            Create Uom
        @endslot
    @endcomponent
    <form method="POST" action="{{ route('uom.store') }}" role="form" enctype="multipart/form-data">
        @csrf
        @include('admin.library.uom.form')
    </form>
@endsection

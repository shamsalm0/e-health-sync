@extends('layouts.master')
@section('title')
    Create Symptom
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Library
        @endslot
        @slot('li2')
            Symptom
        @endslot
        @slot('li2Url')
            symptom.index
        @endslot
        @slot('title')
            Create Symptom
        @endslot
    @endcomponent
    <form method="POST" action="{{ route('symptom.store') }}" role="form" enctype="multipart/form-data">
        @csrf
        @include('admin.library.symptom.form')
    </form>
@endsection


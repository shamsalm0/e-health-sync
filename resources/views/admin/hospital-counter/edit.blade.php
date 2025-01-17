@extends('layouts.master')

@section('title')
        Update Hospital Counter
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Hospital Counter
        @endslot
        @slot('li2')
            List
        @endslot
        @slot('li2Url')
            hospital-counter.index
        @endslot
        @slot('title')
            Update Hospital Counter
        @endslot
    @endcomponent

    <form action="{{ route('hospital-counter.update', $hospitalCounter->id) }}" method="POST"  role="form" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.hospital-counter.form')
             
    </form>
@endsection

@extends('layouts.master')

@section('title')
        Create Hospital Counter
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
            Create Hospital Counter
        @endslot
    @endcomponent

    <form action="{{ route('hospital-counter.store') }}" method="POST"  role="form" enctype="multipart/form-data">
        @csrf

        @include('admin.hospital-counter.form') 
               
    </form>
@endsection

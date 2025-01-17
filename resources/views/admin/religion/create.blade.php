@extends('layouts.master')

@section('title')
        Create Religion
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Religion
        @endslot
        @slot('li2')
            List
        @endslot
        @slot('li2Url')
            religion.index
        @endslot
        @slot('title')
            Create Religion
        @endslot
    @endcomponent

    <form action="{{ route('religion.store') }}" method="POST"  role="form" enctype="multipart/form-data">
        @csrf

        @include('admin.religion.form') 
               
    </form>
@endsection

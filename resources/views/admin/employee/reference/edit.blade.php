@extends('layouts.master')

@section('title')
    Update Reference
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Reference
        @endslot
        @slot('li2')
            List
        @endslot
        @slot('li2Url')
            reference.index
        @endslot
        @slot('title')
            Update Reference
        @endslot
    @endcomponent

    <form action="{{ route('reference.update', $reference->id) }}" method="POST" role="form"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.employee.reference.form')

    </form>
@endsection

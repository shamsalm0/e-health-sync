@extends('layouts.master')

@section('title')
    Create Blood Group
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Library
        @endslot
        @slot('li2')
            Blood Group List
        @endslot
        @slot('li2Url')
            blood-group.index
        @endslot
        @slot('title')
            Create Blood Group
        @endslot
    @endcomponent

    <form action="{{ route('blood-group.store') }}" method="POST" role="form" enctype="multipart/form-data">
        @csrf

        @include('admin.blood-group.form')

    </form>
@endsection

@extends('layouts.master')

@section('title')
    Update Blood Group
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
            Update Blood Group
        @endslot
    @endcomponent

    <form action="{{ route('blood-group.update', $bloodGroup->id) }}" method="POST" role="form"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.blood-group.form')

    </form>
@endsection

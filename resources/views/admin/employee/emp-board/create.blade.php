@extends('layouts.master')

@section('title')
        Create Emp Board
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Emp Board
        @endslot
        @slot('li2')
            List
        @endslot
        @slot('li2Url')
            emp-board.index
        @endslot
        @slot('title')
            Create Emp Board
        @endslot
    @endcomponent

    <form action="{{ route('emp-board.store') }}" method="POST"  role="form" enctype="multipart/form-data">
        @csrf

        @include('admin.employee.emp-board.form')

    </form>
@endsection

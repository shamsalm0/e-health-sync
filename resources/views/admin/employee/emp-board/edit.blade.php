@extends('layouts.master')

@section('title')
        Update Emp Board
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
            Update Emp Board
        @endslot
    @endcomponent

    <form action="{{ route('emp-board.update', $empBoard->id) }}" method="POST"  role="form" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.employee.emp-board.form')
             
    </form>
@endsection

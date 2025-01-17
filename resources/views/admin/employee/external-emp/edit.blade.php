@extends('layouts.master')

@section('title')
    Update External Emp
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            External Emp
        @endslot
        @slot('li2')
            List
        @endslot
        @slot('li2Url')
            external-emp.index
        @endslot
        @slot('title')
            Update External Emp
        @endslot
    @endcomponent

    <form action="{{ route('external-emp.update', $externalEmp->id) }}" method="POST" role="form"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.employee.external-emp.form')

    </form>
@endsection

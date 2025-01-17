@extends('layouts.master')

@section('title')
        Create Agent Commission
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Agent Commission
        @endslot
        @slot('li2')
            List
        @endslot
        @slot('li2Url')
            agent-commission.index
        @endslot
        @slot('title')
            Create Agent Commission
        @endslot
    @endcomponent

    <form action="{{ route('agent-commission.store') }}" method="POST"  role="form" enctype="multipart/form-data">
        @csrf

        @include('admin.agent-commission.form') 
               
    </form>
@endsection

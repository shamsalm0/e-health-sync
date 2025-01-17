@extends('layouts.master')

@section('title')
        Create Agent
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Agent
        @endslot
        @slot('li2')
            List
        @endslot
        @slot('li2Url')
            agent.index
        @endslot
        @slot('title')
            Create Agent
        @endslot
    @endcomponent

    <form action="{{ route('agent.store') }}" method="POST"  role="form" enctype="multipart/form-data">
        @csrf

        @include('admin.agent.form') 
               
    </form>
@endsection

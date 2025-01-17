@extends('layouts.master')

@section('title')
        Update Agent
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
            Update Agent
        @endslot
    @endcomponent

    <form action="{{ route('agent.update', $agent->id) }}" method="POST"  role="form" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.agent.form')
             
    </form>
@endsection

@extends('layouts.master')

@section('title')
        Update Agent Commission
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
            Update Agent Commission
        @endslot
    @endcomponent

    <form action="{{ route('agent-commission.update', $agentCommission->id) }}" method="POST"  role="form" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.agent-commission.form')
             
    </form>
@endsection

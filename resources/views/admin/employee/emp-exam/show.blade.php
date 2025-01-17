@extends('layouts.master')
@section('title')
    Show Emp Exam
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Emp Exam
        @endslot
        @slot('li2')
            List
        @endslot
        @slot('li2Url')
            emp-exam.index
        @endslot
        @slot('title')
            Show Emp Exam
        @endslot
    @endcomponent
    <div class="card">
        <div class="card-body">
            <x-table class="table mb-0">
                <tr>
                    <td width="160">Name</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $empExam->name }}</th>
                </tr>
                <tr>
                    <td width="160">Level</td>
                    <td width="30" class="text-center">:</td>
                    <th>{{ $empExam->level }}</th>
                </tr>
                <tr>
                    <td width="160">Status</td>
                    <td width="30" class="text-center">:</td>
                    <th><x-status :status="$empExam->status" /></th>
                </tr>
            </x-table>
        </div>
    </div>
    <a href="{{ route('emp-exam.index') }}" class="btn btn-outline-dark">Back</a>
@endsection

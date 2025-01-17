@extends('layouts.master')
@section('title')
    User Information
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Users
        @endslot
        @slot('li2')
            Users Information
        @endslot
        @slot('li2Url')
            user.index
        @endslot
        @slot('title')
            User Information
        @endslot
    @endcomponent
    <div class="card">
        <div class="card-body">
            <table class="table">
                <tr>
                    <td width="160">Name</td>
                    <td width="30" class="text-center">:</td>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <td width="160">Email</td>
                    <td width="30" class="text-center">:</td>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <td width="160">User name</td>
                    <td width="30" class="text-center">:</td>
                    <td>{{ $user->username }}</td>
                </tr>
                <tr>
                    <td width="160">Nid</td>
                    <td width="30" class="text-center">:</td>
                    <td>{{ $user->nid }}</td>
                </tr>
                <tr>
                    <td width="160">Contact</td>
                    <td width="30" class="text-center">:</td>
                    <td>{{ $user->contact }}</td>
                </tr>
                <tr>
                    <td width="160">Address</td>
                    <td width="30" class="text-center">:</td>
                    <td>{{ $user->address }}</td>
                </tr>
                <tr>
                    @php
                        $createUser = DB::table('users')->find($user->created_by);
                    @endphp
                    <td width="160">Created By</td>
                    <td width="30" class="text-center">:</td>
                    <td>{{ $createUser ? $createUser->name : '' }}</td>
                </tr>
                <tr>
                    @php
                        $updateUser = DB::table('users')->find($user->updated_by);
                    @endphp
                    <td width="160">Updated By</td>
                    <td width="30" class="text-center">:</td>
                    <td>{{ $updateUser ? $updateUser->name : '' }}</td>
                </tr>
                <tr>
                    <td width="160">Status</td>
                    <td width="30" class="text-center">:</td>
                    <td>
                        @if ($user->status == 1)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-warning">Inactive</span>
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <a class="btn btn-sm btn-outline-danger" href="{{ route('user.index') }}">Back</a>
@endsection


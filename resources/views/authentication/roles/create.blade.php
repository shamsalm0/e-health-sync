@extends('layouts.master')
@section('title')
    Create Role
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Library
        @endslot
        @slot('li2')
            Roles
        @endslot
        @slot('li2Url')
            roles.index
        @endslot
        @slot('title')
            Create Role
        @endslot
    @endcomponent
    <x-alert />
    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-2">
                    <label for="role_name">Role Name <span class="text-danger">*</span></label>
                    <input value="{{ old('name') }}" id="role_name" name="name"
                        class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Role Name">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>

        <div class="px-4 row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
            <label for="role_name"><b>Permission List</b> <span class="text-danger">*</span></label>
            <hr class="w-100">
            <div class="w-100">
                <input type="checkbox" class="form-check-input" id="checkAll">
                <label for="checkAll" class="text-success">Select All</label>
            </div>
            @foreach ($permissions as $k => $permission)
                <div class="">
                    <div class="mb-2">
                        <input type="checkbox" class="form-check-input permission" name="permission[]"
                            value="{{ $permission->id }}" id="{{ $permission->id }}">
                        <label for="{{ $permission->id }}">
                            {{ ucwords(str_replace('-', ' ', $permission->name)) }}
                        </label>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="mb-5">
            @error('permission')
                <small class="text-danger">Minimum One Permission Field Required</small>
            @enderror
        </div>
        <button class="btn btn-sm btn-primary mb-4">Submit</button>
        <a href="{{ route('roles.index') }}" class="btn btn-outline-danger btn-sm mb-4">Cancel</a>
    </form>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $("#checkAll").click(function() {
                if ($('#checkAll').is(':checked')) {
                    $('.permission').prop('checked', true);
                } else {
                    $('.permission').prop('checked', false);
                }
            });
        });
    </script>
@endsection

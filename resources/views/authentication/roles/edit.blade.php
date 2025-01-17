@extends('layouts.master')
@section('title')
    Update Role
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
            Update Role
        @endslot
    @endcomponent
    <x-alert />
    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3 d-flex justify-content-between align-items-start">
            <h4 class="m-0 card-title">Edit Permission <span class="text-danger">*</span></h4>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="mb-2">
                    <label for="role_name">Role Name <span class="text-danger">*</span></label>
                    <input value="{{ $role->name }}" id="role_name" name="name"
                        class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Role Name">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="px-4 row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
            <div class="w-100 my-2">
                <input type="checkbox" class="form-check-input" id="checkAll">
                <label for="checkAll" class="text-success">Select All</label>
            </div>
            @foreach ($permissions as $k => $permission)
                <div class="">
                    <div class="mb-2">
                        <input true type="checkbox" class="form-check-input permission" name="permission[]"
                            value="{{ $permission->id }}" id="{{ $permission->id }}">
                        <label for="{{ $permission->id }}" style="font-weight: normal">
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
    @foreach ($rolePermissions as $key => $permission)
        <script>
            $("input[value={{ $permission }}]").attr('checked', '');
        </script>
    @endforeach
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

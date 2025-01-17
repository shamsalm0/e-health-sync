@extends('layouts.master')
@section('title')
    @lang('translation.starter')
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
            Role Details
        @endslot
    @endcomponent
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Role Details</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-2">
                        <table class="">
                            <tr>
                                <td class="ps-0">Permission Name </td>
                                <td class="text-center" width="30">:</td>
                                <th class="">{{ ucwords(str_replace('-', ' ', $role->name)) }}</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="px-4 row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
                @foreach ($permissions as $k => $permission)
                    <div class="">
                        <div class="mb-2">
                            <input type="checkbox" class="form-check-input" name="permission[]"
                                value="{{ $permission->id }}">
                            <label>
                                {{-- {{ ucwords(str_replace('-', ' ', $permission->name)) }} --}}
                                {{ $permission->name }}
                            </label>
                        </div>
                    </div>
                @endforeach

            </div>

            <a href="{{ route('roles.index') }}" class="btn btn-sm btn-primary">Back to List</a>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
    <!--jquery cdn-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        @foreach ($rolePermissions as $key => $permission)
            $("input[value={{ $permission->permission_id }}]").attr('checked', '');
        @endforeach
        $('input[type=checkbox]').click(function() {
            return false;
        });
    </script>
@endsection

@extends('layouts.master')
@section('title')
    Create Employee
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li1')
            Library
        @endslot
        @slot('li2')
            Empolyee
        @endslot
        @slot('li2Url')
            employee.basic
        @endslot
        @slot('title')
            Create Employee
        @endslot
    @endcomponent
    <div class="row">
        <div class="card">
            <x-alert />
            <div class="card-body">
                <ul class="nav nav-pills arrow-navtabs nav-primary bg-light mb-3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('employee.basic') ? 'active' : '' }}"
                            href="{{ route('employee.basic') }}" role="tab">
                            <span class="d-block d-sm-none"><i class="mdi mdi-account"></i></span>
                            <span class="d-none d-sm-block">Basic Info</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('employee.family') ? 'active' : '' }}"
                            {{-- href="{{ route('employee.family') }}"  --}} role="tab">
                            <span class="d-block d-sm-none"><i class="mdi mdi-home-variant"></i></span>
                            <span class="d-none d-sm-block">family</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('employee.contact') ? 'active' : '' }}"
                            {{-- href="{{ route('employee.contact') }}"  --}} role="tab">
                            <span class="d-block d-sm-none"><i class="mdi mdi-email"></i></span>
                            <span class="d-none d-sm-block">Contact Info</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('employee.curriculum') ? 'active' : '' }}"
                            {{-- href="{{ route('employee.curriculum') }}"  --}} role="tab">
                            <span class="d-block d-sm-none"><i class="mdi mdi-email"></i></span>
                            <span class="d-none d-sm-block">Curriculum Info</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('employee.bank') ? 'active' : '' }}" {{-- href="{{ route('employee.bank') }}"  --}}
                            role="tab">
                            <span class="d-block d-sm-none"><i class="mdi mdi-email"></i></span>
                            <span class="d-none d-sm-block">Bank Info</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('employee.weekend') ? 'active' : '' }}"
                            {{-- href="{{ route('employee.weekend') }}"  --}} role="tab">
                            <span class="d-block d-sm-none"><i class="mdi mdi-email"></i></span>
                            <span class="d-none d-sm-block">Weekend</span>
                        </a>
                    </li>
                </ul>
                @yield('form')
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("input[type='date']", {
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
        });
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection

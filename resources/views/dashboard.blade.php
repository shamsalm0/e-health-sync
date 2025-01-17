@extends('layouts.master')
@section('title')
    @lang('translation.analytics')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"
          type="text/css"/>
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Dashboards
        @endslot
        @slot('title')
            Dashboard
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-12">
            <div class="d-flex flex-column h-100">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card card-animate bg-primary bg-opacity-25">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center p-2">
                                    <div>
                                        <div class="avatar-sm flex-shrink-1">
                                            <span class="avatar-title bg-primary rounded-circle fs-2">
                                                <i class="mdi mdi-doctor mdi-36px"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div>
                                        <h4 class="fw-medium text-primary mb-0">Doctors</h4>
                                        <h2 class="my-2 ff-secondary fw-semibold"><span class="counter-value"
                                                                                        data-target="20">0</span></h2>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div> <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col-md-3">
                        <div class="card card-animate bg-info bg-opacity-25">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center p-2">
                                    <div>
                                        <div class="avatar-sm flex-shrink-1">
                                            <span class="avatar-title bg-info rounded-circle fs-2">
                                                <i class="mdi mdi-account-supervisor mdi-36px"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div>
                                        <h4 class="fw-medium text-info mb-0">Nurses</h4>
                                        <h2 class="my-2 ff-secondary fw-semibold"><span class="counter-value"
                                                                                        data-target="50">0</span></h2>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div> <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col-md-3">
                        <div class="card card-animate bg-warning bg-opacity-25">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center p-2">
                                    <div>
                                        <div class="avatar-sm flex-shrink-1">
                                            <span class="avatar-title bg-warning rounded-circle fs-2">
                                                <i class="mdi mdi-account-group mdi-36px"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div>
                                        <h4 class="fw-medium text-warning mb-0">Patients</h4>
                                        <h2 class="my-2 ff-secondary fw-semibold"><span class="counter-value"
                                                                                        data-target="1000">0</span></h2>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div> <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col-md-3">
                        <div class="card card-animate bg-danger bg-opacity-25">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center p-2">
                                    <div>
                                        <div class="avatar-sm flex-shrink-1">
                                            <span class="avatar-title bg-danger rounded-circle fs-2">
                                                <i class="mdi mdi-pill mdi-36px"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div>
                                        <h4 class="fw-medium text-danger mb-0">Pharmacists</h4>
                                        <h2 class="my-2 ff-secondary fw-semibold"><span class="counter-value"
                                                                                        data-target="150">0</span></h2>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Monthly Income</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="lineChart" class="chartjs-chart"
                                        data-colors='["--vz-primary-rgb, 0.2", "--vz-primary", "--vz-success-rgb, 0.2", "--vz-success"]'></canvas>
                            </div>
                        </div>
                    </div> <!-- end col -->

                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Bar Chart</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="bar" class="chartjs-chart"
                                        data-colors='["--vz-primary-rgb, 0.8", "--vz-primary-rgb, 0.9"]'></canvas>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Monthly Appoinment Details</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-pie"
                                     data-colors='["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger", "--vz-info"]'
                                     class="e-charts"></div>
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->

                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Hospital Bed Status</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="pieChart" class="chartjs-chart"
                                        data-colors='["--vz-success", "--vz-warning"]'></canvas>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div> <!-- end col-->
        </div>
    </div>
    <div class="row">
        <div class="col-xl-7">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">New Appoinments</h4>
                    <div class="flex-shrink-0">
                        <div class="dropdown card-header-dropdown">
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Patient</a>
                                <a class="dropdown-item" href="#">Doctor</a>
                                <a class="dropdown-item" href="#">Date</a>
                                <a class="dropdown-item" href="#">Time</a>
                                <a class="dropdown-item" href="#">Contact</a>
                            </div>
                        </div>
                    </div>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table table-borderless table-hover table-nowrap align-middle mb-0">
                            <thead class="table-light">
                            <tr class="text-muted">
                                <th scope="col">Patient</th>
                                <th scope="col" style="width: 20%;">Doctor</th>
                                <th scope="col">Date</th>
                                <th scope="col" style="width: 16%;">Time</th>
                                <th scope="col" style="width: 12%;">Contact</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <td>Absternet LLC</td>
                                <td>Dr. Kuddus Khan</td>
                                <td>Sep 20, 2021</td>
                                <td>8:00 pm</td>
                                <td>
                                    <div class="text-nowrap">$100.1K</div>
                                </td>
                            </tr>
                            <tr>
                                <td>Raitech Soft</td>
                                <td>Dr. Arif Khan</td>
                                <td>Sep 23, 2021</td>
                                <td>2:00 pm</td>
                                <td>
                                    <div class="text-nowrap">$150K</div>
                                </td>
                            </tr>
                            <tr>
                                <td>William PVT</td>
                                <td>Dr. Nafiza Kamal</td>
                                <td>Sep 27, 2021</td>
                                <td>6:00 pm</td>
                                <td>
                                    <div class="text-nowrap">$78.18K</div>
                                </td>
                            </tr>
                            <tr>
                                <td>Loiusee LLP</td>
                                <td>Dr. Kuddus Khan</td>
                                <td>Sep 30, 2021</td>
                                <td>5:00 pm</td>
                                <td>
                                    <div class="text-nowrap">$180K</div>
                                </td>
                            </tr>
                            <tr>
                                <td>Apple Inc.</td>
                                <td>Dr. Nafiza Kamal</td>
                                <td>Sep 30, 2021</td>
                                <td>1:00 pm</td>
                                <td>
                                    <div class="text-nowrap">$78.9K</div>
                                </td>
                            </tr>
                            </tbody><!-- end tbody -->
                        </table><!-- end table -->
                    </div><!-- end table responsive -->
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->

        <div class="col-xl-5">
            <div class="card">
                <div class="card-header align-items-center d-flex border-bottom-dashed">
                    <h4 class="card-title mb-0 flex-grow-1">Doctors List</h4>
                    <div class="flex-shrink-0">
                        <button type="button" class="btn btn-soft-danger btn-sm shadow-none" data-bs-toggle="modal"
                                data-bs-target="#inviteMembersModal">Appoinments
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <div data-simplebar style="height: 235px;" class="mx-n3 px-3">
                        <div class="vstack gap-3">
                            <div class="d-flex align-items-center">
                                <div class="avatar-xs flex-shrink-0 me-3">
                                    <img src="{{ URL::asset('build/images/users/avatar-2.jpg') }}" alt=""
                                         class="img-fluid rounded-circle">
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Nancy
                                            Martino</a></h5>
                                    <span>MBBS, Dhaka Medical Hospital</span>
                                </div>
                                <div class="flex-shrink-0">
                                    <div class="d-flex align-items-center gap-1">
                                        <div class="dropdown">
                                            <button class="btn btn-icon btn-sm fs-16 text-muted dropdown shadow-none"
                                                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                                class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                                class="ri-star-fill text-muted me-2 align-bottom"></i>Appoinments</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end member item -->
                            <div class="d-flex align-items-center">
                                <div class="avatar-xs flex-shrink-0 me-3">
                                    <div class="avatar-title bg-danger-subtle text-danger rounded-circle shadow">
                                        HB
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Henry
                                            Baird</a></h5>
                                    <span>MBBS & PHD, Rajshahi Medical & Oxford</span>
                                </div>
                                <div class="flex-shrink-0">
                                    <div class="d-flex align-items-center gap-1">

                                        <div class="dropdown">
                                            <button class="btn btn-icon btn-sm fs-16 text-muted dropdown shadow-none"
                                                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                                class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                                class="ri-star-fill text-muted me-2 align-bottom"></i>Appoinments</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end member item -->
                            <div class="d-flex align-items-center">
                                <div class="avatar-xs flex-shrink-0 me-3">
                                    <img src="{{ URL::asset('build/images/users/avatar-3.jpg') }}" alt=""
                                         class="img-fluid rounded-circle shadow">
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Frank
                                            Hook</a></h5>
                                    <span>MBBS & PHD, Rajshahi Medical & Oxford</span>
                                </div>
                                <div class="flex-shrink-0">
                                    <div class="d-flex align-items-center gap-1">
                                        <div class="dropdown">
                                            <button class="btn btn-icon btn-sm fs-16 text-muted dropdown shadow-none"
                                                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                                class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                                class="ri-star-fill text-muted me-2 align-bottom"></i>Appoinments</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end member item -->
                            <div class="d-flex align-items-center">
                                <div class="avatar-xs flex-shrink-0 me-3">
                                    <img src="{{ URL::asset('build/images/users/avatar-4.jpg') }}" alt=""
                                         class="img-fluid rounded-circle shadow">
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Jennifer
                                            Carter</a></h5>
                                    <span>MBBS & PHD, Rajshahi Medical & Oxford</span>
                                </div>
                                <div class="flex-shrink-0">
                                    <div class="d-flex align-items-center gap-1">
                                        <div class="dropdown">
                                            <button class="btn btn-icon btn-sm fs-16 text-muted dropdown shadow-none"
                                                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                                class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                                class="ri-star-fill text-muted me-2 align-bottom"></i>Appoinments</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end member item -->
                            <div class="d-flex align-items-center">
                                <div class="avatar-xs flex-shrink-0 me-3">
                                    <div class="avatar-title bg-success-subtle text-success rounded-circle shadow">
                                        AC
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Alexis Clarke</a>
                                    </h5>
                                    <span>MBBS & PHD, Rajshahi Medical & Oxford</span>
                                </div>
                                <div class="flex-shrink-0">
                                    <div class="d-flex align-items-center gap-1">
                                        <div class="dropdown">
                                            <button class="btn btn-icon btn-sm fs-16 text-muted dropdown shadow-none"
                                                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                                class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                                class="ri-star-fill text-muted me-2 align-bottom"></i>Appoinments</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end member item -->
                            <div class="d-flex align-items-center">
                                <div class="avatar-xs flex-shrink-0 me-3">
                                    <img src="{{ URL::asset('build/images/users/avatar-7.jpg') }}" alt=""
                                         class="img-fluid rounded-circle shadow">
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Joseph Parker</a>
                                    </h5>
                                    <span>MBBS & PHD, Rajshahi Medical & Oxford</span>
                                </div>
                                <div class="flex-shrink-0">
                                    <div class="d-flex align-items-center gap-1">
                                        <div class="dropdown">
                                            <button class="btn btn-icon btn-sm fs-16 text-muted dropdown shadow-none"
                                                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                                class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                                class="ri-star-fill text-muted me-2 align-bottom"></i>Appoinments</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end member item -->
                        </div>
                        <!-- end list -->
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div><!-- end col -->
    </div><!-- end row -->
    <div style="margin-bottom: 200px">
        @php
            $grades = \App\Models\Admin\Library\Grade::take(3)->get();
        @endphp
        <livewire:select2-dropdown name="grade" model="Grade" searchRoute="{{ route('select.search', 'Grade') }}"
                                   :options="$grades" wire:model.live="selectValue"/>
    </div>
@endsection
@section('script')
    <!-- apexcharts -->

    <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/jsvectormap/maps/world-merc.js') }}"></script>

    <!-- dashboard init -->
    <script src="{{ URL::asset('build/js/pages/dashboard-analytics.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>

    <!-- Chart Js -->
    <script src="{{ URL::asset('build/libs/chart.js/chart.umd.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/chartjs.init.js') }}"></script>

    <!--echarts -->
    <script src="{{ URL::asset('build/libs/echarts/echarts.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/echarts.init.js') }}"></script>

    <!--select2 -->
@endsection

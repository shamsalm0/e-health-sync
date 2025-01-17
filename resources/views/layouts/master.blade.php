<!doctype html>
@php
    $theme = \App\Models\ThemeSetting::first();
@endphp

<html class="sf-js-enabled" lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      data-layout="{{ $theme?->layout ?? 'vertical' }}" data-topbar="{{ $theme->topbar_color ?? 'light' }}"
      data-sidebar="{{ $theme->sidebar_color ?? 'dark' }}" data-sidebar-size="{{ $theme->sidebar_size ?? 'lg' }}"
      data-sidebar-image="{{ $theme->sidebar_image ?? 'none' }}" data-preloader="{{ $theme->preloader ?? 'disable' }}"
      data-bs-theme="{{ $theme->color_scheme ?? 'galaxy' }}">


{{-- <html lang="en" data-sidebar-visibility="show" data-layout-style="default" data-layout-width="fluid"
    data-layout-position="fixed"> --}}
{{-- <html  data-layout="vertical" data-topbar="light" data-sidebar="dark"
    data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="galaxy"> --}}

<head>
    <meta charset="utf-8"/>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description"/>
    <meta content="Themesbrand" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('build/images/favicon.ico') }}">
    @include('layouts.head-css')

    <style>
        .search-label {
            font-size: 12px;
            margin-bottom: 3px;
        }

        .form-select:focus,
        .form-select-sm:focus,
        .form-select-lg:focus,
        .form-control:focus,
        .form-control-sm:focus,
        .form-control-lg:focus {
            box-shadow: none;
        }

        table .th-id {
            width: 50px;
        }

        table .th-action {
            width: 60px;
        }

        #status {
            width: 100%;
            height: auto;
            position: static;
            left: 0;
            top: 0;
            margin: 0 0 0 0;
        }
    </style>
    @livewireStyles
</head>

@section('body')
    @include('layouts.body')
@show
<!-- Begin page -->
<div id="layout-wrapper">
    @include('layouts.topbar')
    @include('layouts.sidebar')
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        @include('layouts.footer')
    </div>
    <!-- end main content-->
</div>
<!-- END layout-wrapper -->

{{-- @include('layouts.customizer') --}}

<!-- JAVASCRIPT -->
@include('layouts.vendor-scripts')
<script src="{{ URL::asset('build/js/app.js') }}"></script>
@livewireScripts
</body>

</html>

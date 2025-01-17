@extends('layouts.master-without-nav')
@section('title')
    Inactive Account
@endsection
@section('content')
    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <a href="index" class="d-inline-block auth-logo">
                                    <img src="{{ URL::asset('build/images/logo-light.png') }}" alt=""
                                        height="20">
                                </a>
                            </div>
                            <p class="mt-3 fs-15 fw-medium">Provide Health Service to your Door</p>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">

                            <div class="card-body p-4">
                                <div class="mb-4">
                                    <div class="avatar-lg mx-auto">
                                        <div class="avatar-title bg-light text-primary display-5 rounded-circle">
                                            <i class="ri-error-warning-line"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-2 mt-4">
                                    <div class="text-center mb-4 mx-lg-3">
                                        <h4 class="text-danger">Your account is inactive</h4>
                                        <p class="text-muted">Contact with <span class="fw-semibold">World tech</span> to
                                            activate
                                            your account.</p>
                                    </div>
                                    <h5 class="text-center mb-4 mx-lg-3">Support: <a style="text-decoration: none;"
                                            href="callto:+8801915208835">+8801915208835</a></h5>
                                    <div class="text-muted text-center mb-4 mx-lg-3">
                                        <p>Your account deactivated by world tech due to your incomplete information. Please
                                            contact with <span class="fw-semibold">World tech</span> to provide your
                                            information. If you have any query contact with support
                                            team.
                                        </p>
                                    </div>
                                    <form class="" action="{{ route('login') }}" method="POST">
                                        <a href="{{ url('/') }}" class="btn btn-success w-100">
                                            Go to Sign In Page
                                        </a>
                                    </form>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                        {{-- <div class="mt-4 text-center">
                            <p class="mb-0">Didn't receive a code ? <a href="auth-pass-reset-basic"
                                    class="fw-semibold text-primary text-decoration-underline">Resend</a> </p>
                        </div> --}}

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0 text-muted">&copy;
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> developed <i class="mdi mdi-heart text-danger"></i> by WorldTech
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/particles.js/particles.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/particles.app.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/two-step-verification.init.js') }}"></script>
@endsection


{{-- <body>
    <div class="blur-effect d-flex flex-column md:flex-row justify-content-md-center align-items-md-center">
        <div class="main-wraper">
            <div class="row justify-content-center mb-5">
                <div
                    class="shadow-lg left-side col-12 d-none col-md-4 text-white px-3 py-5 d-md-flex flex-column align-items-center">
                    <div class="bg-white w-50 p-3 rounded mt-3">
                        <img src={{ asset('logo.jpg') }} />
                    </div>
                    <h5 class="my-3 text-white">Warning</h5>
                    <p class="text-center">Smart Cane Procurement and Payment System</p>
                </div>
                <div
                    class="shadow-lg right-side text-center col-12 col-md-6 p-4 d-flex flex-column justify-content-center">
                    <div class="bg-white mx-auto d-block d-md-none w-50 p-3 rounded">
                        <img src={{ asset('logo.jpg') }} class="img-fluid img-thumbnail" />
                    </div>
                    <div class="text-warning mb-2 ">
                        <i class="fas fa-3x fa-exclamation-triangle"></i>
                    </div>

                    <h4 class="text-danger">Your account is inactive</h4>
                    <h5>Contact with BSFIC to activate your account.</h5>
                    <h5>Support: <a style="text-decoration: none;" href="callto:+8801915208835">+8801915208835</a></h5>
                    <p>Your account deactivated by world tech due to your incomplete information. Please contact with
                        bsfic to provide your information. If you have any query contact with support team.</p>
                    <form class="" action="{{ route('login') }}" method="POST">
                        <a href="{{ url('/') }}" class="btn btn-block mt-2 btn-indigo form-control">
                            Go to Sign In Page
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>


</body> --}}

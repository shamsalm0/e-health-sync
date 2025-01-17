<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Smart Cane Procurement and Payment System</title>
    <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
</head>

<style>
    body {
        background-image: url("{{ asset('cane.jpg') }}");
        background-repeat: no-repeat;
        background-size: cover;
        -webkit-backdrop-filter: blur(5px);
        backdrop-filter: blur(5px);
    }

    .blur-effect {
        width: 100%;
        height: 100vh;
        background-color: rgba(0, 0, 0, 0.4);
    }

    .main-wraper {
        width: 60%;
        height: 50vh;
    }

    .left-side {
        background-color: #6259ca;
        border-radius: 10px 0px 0px 10px;
    }

    .left-side img {
        width: 100%;
    }

    .left-side p {
        font-size: 14px;
    }

    .right-side {
        background-color: #fff;
        color: #9794a7;
        border-radius: 0px 10px 10px 0px;
    }

    .right-side h5 {
        color: #222;
    }

    .right-side p {
        font-size: 14px;
    }

    .btn-indigo {
        background-color: #6259ca;
        color: #fff;
    }

    .btn-indigo:hover {
        background-color: #403fad;
        color: #fff;
    }

    .forget-pass {
        color: #6259ca;
    }

    form {
        font-size: 15px;
    }

    input[type="text"]::placeholder,
    input[type="password"]::placeholder {
        color: #999;
        font-size: 14px;
    }

    @media only screen and (max-width: 757px) {
        body {
            width: 100%;
            background-image: cover;
        }

        .main-wraper {
            width: 80%;
            margin: 10px auto;
        }

        .right-side {
            border-radius: 10px;
        }

        .blur-effect {
            height: 120vh;
        }
    }

    .form-control:focus {
        box-shadow: none;
    }
</style>

<body>
    <div class="blur-effect d-flex flex-column md:flex-row justify-content-md-center align-items-md-center">
        <div class="main-wraper">
            <div class="row justify-content-center mb-5">
                <div
                    class="shadow-lg left-side col-12 d-none col-md-4 text-white px-3 py-5 d-md-flex flex-column align-items-center">
                    <div class="bg-white w-50 p-3 rounded mt-3">
                        <img src={{ asset('logo.jpg') }} />
                    </div>
                    <h5 class="my-3 text-white">Sign In For</h5>
                    <p class="text-center">Smart Cane Procurement and Payment System</p>
                </div>
                <div class="shadow-lg right-side col-12 col-md-6 p-4">
                    <div class="bg-white mx-auto d-block d-md-none w-50 p-3 rounded mt-3">
                        <img src={{ asset('logo.jpg') }} class="img-fluid img-thumbnail" />
                    </div>
                    <h5>Signin to Your Account</h5>
                    <p>Signin to manage the system.</p>
                    <form method="POST" action="{{ route('user.verify-otp', ['id' => $id]) }}">
                        @csrf
                        <div class="text-start form-group my-3">
                            <label class="form-label" for="formOtp">Email</label>
                            <input type="number" name="otp" required id="formOtp" placeholder="Enter your Otp"
                                class="form-control @error('otp') is-invalid @enderror" />
                            @error('otp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-block mt-2 btn-indigo form-control">
                            Sign In
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>

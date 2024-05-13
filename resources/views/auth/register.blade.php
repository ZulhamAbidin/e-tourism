<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/brand/logo-2.png') }}" />
    <title>E-Pariwisata Register</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="app sidebar-mini ltr light-mode">

    <div class="container-fluid">

        @if($errors->has('password'))
        <div class="toast show fade mb-2 mt-2" role="alert" aria-live="assertive" aria-atomic="true"
            data-bs-autohide="false">
            <div class="toast-header">
                <img src="../assets/images/brand/logo-2.png" alt="" class="me-2" height="18">
                <strong class="me-auto">E-Pariwisata</strong>
                <button aria-label="Close" class="btn-close fs-20" data-bs-dismiss="toast"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="toast-body">
                Kombinasi Email dan Password tidak sesuai
            </div>
        </div>
        @endif

        @if($errors->has('email'))
        <div class="toast show fade mb-2 mt-2" role="alert" aria-live="assertive" aria-atomic="true"
            data-bs-autohide="false">
            <div class="toast-header">
                <img src="../assets/images/brand/logo-2.png" alt="" class="me-2" height="18">
                <strong class="me-auto">E-Pariwisata</strong>
                <button aria-label="Close" class="btn-close fs-20" data-bs-dismiss="toast"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="toast-body">
                Alamat email telah digunakan
            </div>
        </div>
        @endif

        @if($errors->has('name'))
        <div class="toast show fade mb-2 mt-2" role="alert" aria-live="assertive" aria-atomic="true"
            data-bs-autohide="false">
            <div class="toast-header">
                <img src="../assets/images/brand/logo-2.png" alt="" class="me-2" height="18">
                <strong class="me-auto">E-Pariwisata</strong>
                <button aria-label="Close" class="btn-close fs-20" data-bs-dismiss="toast"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="toast-body">
                Username telah digunakan
            </div>
        </div>
        @endif
    </div>


    <div class="page">
        <div class="page-main">

            <div class="side-app">
                <div class="container mt-6 justify-items-center">

                    <div class="row justify-content-center">
                        <div class="col-10 col-md-9 col-xl-7 col-lg-7">
                            <div class="card">

                                <div class="card-header pt-6 fw-bold">
                                    <h4 class="text-center">DAFTAR</h4>
                                </div>

                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row mb-4">
                                            <label class="col-md-3 col-form-label" for="username">Username</label>
                                            <div class="col-md-9">
                                                <input type="name" id="name" name="name" class="form-control"
                                                    placeholder="" value="" required autofocus autocomplete="name">
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-md-3 col-form-label" for="email">Email</label>
                                            <div class="col-md-9">
                                                <input type="email" id="email" name="email" class="form-control"
                                                    placeholder="" value="" required autofocus autocomplete="email">
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-4">
                                            <label class="col-md-3 col-form-label" for="nohp">nohp</label>
                                            <div class="col-md-9">
                                                <input type="number" id="nohp" name="nohp" class="form-control"
                                                    placeholder="" value="" required autofocus autocomplete="nohp">
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-4">
                                            <label class="col-md-3 col-form-label" for="alamat">alamat</label>
                                            <div class="col-md-9">
                                                <input type="alamat" id="alamat" name="alamat" class="form-control"
                                                    placeholder="" value="" required autofocus autocomplete="alamat">
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <label for="password" class="col-md-3 col-form-label">Password</label>
                                            <div class="col-md-9 d-flex align-items-center">
                                                <input type="password" class="form-control" placeholder=""
                                                    name="password" value="" autocomplete="password" id="password">
                                                <i class="fa fa-eye" id="showPasswordToggle"
                                                    style="cursor: pointer; margin-left: 5px;"></i>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="password" class="col-md-3 col-form-label">Konfirmasi
                                                Password</label>
                                            <div class="col-md-9 d-flex align-items-center">
                                                <input type="password" class="form-control" placeholder=""
                                                    name="password_confirmation" value=""
                                                    autocomplete="password_confirmation" id="password2">
                                                <i class="fa fa-eye" id="showPasswordToggle2"
                                                    style="cursor: pointer; margin-left: 5px;"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-end">
                                        <button type="submit" class="btn btn-primary my-1">Submit</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <script>
        const passwordInput = document.getElementById('password');
        const showPasswordToggle = document.getElementById('showPasswordToggle');
        const passwordInput2 = document.getElementById('password2');
        const showPasswordToggle2 = document.getElementById('showPasswordToggle2');

        showPasswordToggle.addEventListener('click', function () {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        });

        showPasswordToggle2.addEventListener('click', function () {
            if (passwordInput2.type === 'password') {
                passwordInput2.type = 'text';
            } else {
                passwordInput2.type = 'password';
            }
        });
    </script>

</body>

</html>

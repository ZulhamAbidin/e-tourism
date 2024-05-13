<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/images/brand/favicon.ico" />
    <title>E-Pariwisata</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="app sidebar-mini ltr light-mode">

    @if($errors->any())
    <div class="toast show fade" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
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


    <div class="page">
        <div class="page-main">

            <div class="side-app "><br><br><br><br>
                <div class="container mt-6 justify-items-center">

                    <div class="row justify-content-center">
                        <div class="col-10 col-md-9 col-xl-5 col-lg-5">
                            <div class="card">

                                <div class="card-header pt-6 fw-bold">
                                    <h4 class="text-center">LOGIN</h4>
                                </div>

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row mb-4">
                                            <label class="col-md-3 col-form-label" for="email">Email</label>
                                            <div class="col-md-9">
                                                <input type="email" id="email" name="email" class="form-control"
                                                    placeholder="" value="" required autofocus
                                                    autocomplete="email">
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="password" class="col-md-3 col-form-label">Password</label>
                                            <div class="col-md-9 d-flex align-items-center">
                                                <input type="password" class="form-control" placeholder="" name="password" value="" autocomplete="password" id="password">
                                                <i class="fa fa-eye" id="showPasswordToggle" style="cursor: pointer; margin-left: 5px;"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-end">
                                        <button type="submit" class="btn btn-primary my-1">Login</button>
                                        <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
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

        showPasswordToggle.addEventListener('click', function () {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        });
    </script>

</body>

</html>

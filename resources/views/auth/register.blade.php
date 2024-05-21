<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/brand/logo-2.png') }}" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">



@extends('layouts.main')

@section('container')
    <div class="main-container container-fluid">

        <div class="page-header">
            <h1 class="page-title">Tambah Users</h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Users</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12">

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Users</h4>
                    </div>

                    <div class="card-body">
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
                                    <label for="password" class="col-md-3 col-form-label">Konfirmasi Password</label>
                                    <div class="col-md-9 d-flex align-items-center">
                                        <input type="password" class="form-control" placeholder="" name="password_confirmation" value="" autocomplete="password_confirmation" id="password2">
                                        <i class="fa fa-eye" id="showPasswordToggle2" style="cursor: pointer; margin-left: 5px;"></i>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <label for="is_admin" class="col-md-3 col-form-label">Status Admin</label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="is_admin" name="is_admin" required>
                                            <option value="0">Pengunjung</option>
                                            <option value="1">Admin</option>
                                        </select>
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
    
@endsection

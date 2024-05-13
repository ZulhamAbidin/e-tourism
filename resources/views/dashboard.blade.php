<!-- resources/views/dashboard.blade.php -->

@extends('layouts.main')

@section('container')
<div class="container">

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Dashboard</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
            <div class="row">

                <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="">
                                <div class="mt-2">
                                    <h6 class="text-center fw-bold">Total Destinasi Wisata </h6>
                                </div>
                                <h2 class="mb-0 number-font text-center">{{ $totalDestinasiWisata }}</h2>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('destinasi-wisata.index') }}" class="btn btn-primary btn-sm btn-block">Lihat Destinasi Wisata</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="">
                                <div class="mt-2">
                                    <h6 class="text-center fw-bold">Total Destinasi Kuliner </h6>
                                </div>
                                <h2 class="mb-0 number-font text-center">{{ $totalDestinasiKuliner }}</h2>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('destinasi-kuliner.index') }}" class="btn btn-primary btn-sm btn-block">Lihat Destinasi Kuliner</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="">
                                <div class="mt-2">
                                    <h6 class="text-center fw-bold">Total Destinasi Hotel </h6>
                                </div>
                                <h2 class="mb-0 number-font text-center">{{ $totalDestinasiHotel }}</h2>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('destinasi-hotel.index') }}" class="btn btn-primary btn-sm btn-block">Lihat Destinasi Hotel</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="">
                                <div class="mt-2">
                                    <h6 class="text-center fw-bold">Total Destinasi Budaya </h6>
                                </div>
                                <h2 class="mb-0 number-font text-center">{{ $totalKebudayaan }}</h2>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('destinasi-wisata.index') }}" class="btn btn-primary btn-sm btn-block">Lihat Destinasi Budaya</a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

</div>
@endsection

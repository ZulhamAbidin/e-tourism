@extends('layouts.main')

@section('container')

<div class="container">

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Cetak</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Laporan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cetak</li>
            </ol>
        </div>
    </div>
    
    <button onclick="printPage()" class="btn btn-primary">Cetak Halaman</button>

    <div class="row" id="print-container">
        <div class="col-lg-12">


            <!-- Destinasi Wisata -->
            <div class="table-responsive">
                <h2>Destinasi Wisata</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($destinasiWisata as $wisata)
                        <tr>
                            <td>{{ $wisata->nama }}</td>
                            <td>{{ $wisata->alamat }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Destinasi Kuliner -->
            <div class="table-responsive">
                <h2>Destinasi Kuliner</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($destinasiKuliner as $kuliner)
                        <tr>
                            <td>{{ $kuliner->nama }}</td>
                            <td>{{ $kuliner->alamat }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Destinasi Hotel -->
            <div class="table-responsive">
                <h2>Destinasi Hotel</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($destinasiHotel as $hotel)
                        <tr>
                            <td>{{ $hotel->nama }}</td>
                            <td>{{ $hotel->alamat }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Kebudayaan -->
            <div class="table-responsive">
                <h2>Kebudayaan</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kebudayaan as $budaya)
                        <tr>
                            <td>{{ $budaya->nama }}</td>
                            <td>{{ $budaya->keterangan }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>


<script>
    function printPage() {
        var printContent = document.getElementById("print-container").innerHTML;
        var originalContent = document.body.innerHTML;
        document.body.innerHTML = printContent;
        window.print();
        document.body.innerHTML = originalContent;
    }
</script>


@endsection


@extends('layouts.pengunjung')

@section('container')

<header class="masthead">
    <div class="container">
        <div class="masthead-heading text-uppercase">Destinasi Kuliner</div>
    </div>
</header>

<section class="page-section" id="Menu">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Menu</h2>
            <h3 class="section-subheading text-muted">Destinasi Kuliner</h3>
        </div>
        <div class="row text-center">

            <table class="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($destinasiKulinerList as $destinasiKuliner)
                    <tr>
                        <td>{{ $destinasiKuliner->nama }}</td>
                        <td>{{ Str::limit($destinasiKuliner->alamat, 500) }}</td>
                        <td><a href="{{ route('pengunjung.kuliner.show', $destinasiKuliner) }}" class="btn btn-primary">Lihat Detail</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</section>

@endsection


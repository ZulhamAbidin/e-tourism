@extends('layouts.pengunjung')

@section('container')

<header class="masthead">
    <div class="container">
        <div class="masthead-heading text-uppercase">Menu Destinasi Wisata</div>
    </div>
</header>

<section class="page-section" id="Menu">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Menu</h2>
            <h3 class="section-subheading text-muted">Destinasi Wisata</h3>
        </div>
        <div class="row text-center">


            <table class="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($destinasiWisataList as $destinasiWisata)
                    <tr>
                        <td>{{ $destinasiWisata->nama }}</td>
                        <td>{{ Str::limit($destinasiWisata->keterangan, 500) }}</td>
                        <td><a href="{{ route('pengunjung.destinasi.show', $destinasiWisata) }}" class="btn btn-primary">Lihat Detail</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</section>

@endsection
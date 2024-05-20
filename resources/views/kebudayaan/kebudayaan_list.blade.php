
@extends('layouts.pengunjung')

@section('container')

<header class="masthead">
    <div class="container">
        <div class="masthead-heading text-uppercase">DESTINASI KEBUDAYAAN</div>
    </div>
</header>

<section class="page-section" id="Menu">
    <div class="container">
        <div class="text-center">
            <h3 class="section-subheading text-muted">LOKASI KEBUDAYAAN</h3>
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
                    @foreach ($destinasikebudayaanList as $destinasikebudayaan)
                    <tr>
                        <td>{{ $destinasikebudayaan->nama }}</td>
                        <td>{{ Str::limit($destinasikebudayaan->keterangan, 500) }}</td>
                        <td><a href="{{ route('pengunjung.kebudayaan.show', $destinasikebudayaan) }}" class="btn btn-primary">Lihat Detail</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</section>

@endsection




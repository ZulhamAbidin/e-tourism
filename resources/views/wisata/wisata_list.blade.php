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

            @foreach ($destinasiWisataList as $destinasiWisata)

            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ url('storage/' . $destinasiWisata->sampul) }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $destinasiWisata->nama }}</h5>
                    <p class="card-text">{{ Str::limit($destinasiWisata->Deskripsi, 500) }}</p>
                    <a href="{{ route('pengunjung.destinasi.show', $destinasiWisata) }}" class="btn btn-primary">Lihat
                        Detail</a>
                </div>
            </div>

            @endforeach

        </div>
    </div>
</section>

@endsection
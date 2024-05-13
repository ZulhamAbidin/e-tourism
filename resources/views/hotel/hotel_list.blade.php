
@extends('layouts.pengunjung')

@section('container')

<header class="masthead">
    <div class="container">
        <div class="masthead-heading text-uppercase">LOKASI PENGINAPAN</div>
    </div>
</header>

<section class="page-section" id="Menu">
    <div class="container">
        <div class="text-center">
            <h3 class="section-subheading text-muted">LOKASI PENGINAPAN</h3>
        </div>
        <div class="row text-center">

            @foreach ($destinasihotelList as $destinasihotel)

            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ url('storage/' . $destinasihotel->sampul) }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $destinasihotel->nama }}</h5>
                    <p class="card-text">{{ Str::limit($destinasihotel->Deskripsi, 500) }}</p>
                    <a href="{{ route('pengunjung.hotel.show', $destinasihotel) }}" class="btn btn-primary">Lihat
                        Detail</a>
                </div>
            </div>

            @endforeach

        </div>
    </div>
</section>

@endsection




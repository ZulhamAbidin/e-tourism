@extends('layouts.pengunjung')

@section('container')


<header class="masthead">
    <div class="container">
        <div class="masthead-heading text-uppercase">Detail Lokasi Kebudayaan  {{ $destinasikebudayaan->nama }} </div>
    </div>
</header>

    <div class="container mt-4" id="">

        <div class="row">

            <div class="col-xl-12">
                <div class="card">
                    @if ($destinasikebudayaan->gambar)
                        <div class="row">
                            @foreach (json_decode($destinasikebudayaan->gambar) as $index => $image)
                                @if($index == 0)
                                    <div class="col-md-12 mb-3">
                                        <img class="card-img-top" src="{{ asset('storage/' . $image) }}" alt="Gambar">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif   
                    <div class="card-body">
                        <h3><a href="javascript:void(0)"> {{ $destinasikebudayaan->nama }}</a></h3>
                        <p class="text-justify">keterangan Kebudayaan {{ $destinasikebudayaan->keterangan }}</p>
                    </div>
                </div>

               </div>

        </div>

    </div>




@endsection

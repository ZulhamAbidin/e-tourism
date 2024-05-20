@extends('layouts.pengunjung')

@section('container')


<header class="masthead">
    <div class="container">
        <div class="masthead-heading text-uppercase">Detail Destinasi Wisata  {{ $destinasiWisata->nama }} </div>
    </div>
</header>

    <div class="container mt-4" id="">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    @if ($destinasiWisata->gambar)
                        <div class="row">
                            @foreach (json_decode($destinasiWisata->gambar) as $index => $image)
                                @if($index == 0)
                                    <div class="col-md-12 mb-3">
                                        <img class="card-img-top" src="{{ asset('storage/' . $image) }}" alt="Gambar">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif                   
                    <div class="card-body">
                        <h3><a href="javascript:void(0)"> {{ $destinasiWisata->nama }}</a></h3>
                        <p class="card-text">Alamat : {{ $destinasiWisata->alamat }}</p>
                        <p class="text-justify">keterangan : {{ $destinasiWisata->keterangan }}</p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Commentar</div>
                    </div>
                    
                    @foreach ($destinasiWisata->komentars as $komentar)
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col media-body overflow-visible">
                                <div class="border mb-5 p-4 br-5">
                                    <span class="fs-sm-1 text-muted">{{ $komentar->email }}</span>
                                    <h5 class="mt-0">{{ $komentar->nama }} </h5>
                                    <span><i class="fe fe-thumb-up text-danger"></i></span>
                                    <p class="font-13 text-muted">{{ $komentar->isi_komentar }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    @endforeach

                  

                </div>
                
                @if (auth()->check())
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Tambah Komentar</div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('pengunjung.destinasi.tambah-komentar', $destinasiWisata) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="{{ auth()->user()->name }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="isi_komentar">Komentar</label>
                                    <textarea class="form-control" id="isi_komentar" name="isi_komentar" rows="5" placeholder="Isi komentar" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Tambah Komentar</button>
                            </form>
                        </div>
                    </div>
                @endif


            </div>
        </div>
    </div>

@endsection

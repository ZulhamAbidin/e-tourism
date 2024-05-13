@extends('layouts.main')

@section('container')
<div class="main-container container-fluid">

    <div class="page-header">
        <h1 class="page-title">Edit Destinasi Wisata</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Destinasi</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </div>
    </div>

    <div class="row">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Destinasi Wisata</h4>
                </div>

                <form action="{{ route('destinasi-wisata.update', ['id' => $destinasiWisata->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                    <div class="form-group col-12">
                        <label for="nama">Nama Destinasi Wisata</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="{{ $destinasiWisata->nama }}" required>
                    </div>
                    <div class="form-group col-12">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" id="alamat" class="form-control" value="{{ $destinasiWisata->alamat }}"
                            required>
                    </div>
                    <div class="form-group col-12">
                        <label for="keterangan">keterangan</label>
                        <textarea name="keterangan" id="keterangan" class="form-control">{{ $destinasiWisata->keterangan }}</textarea>
                    </div>
                    <div class="form-group col-12">
                        <label for="gambar">Gambar Baru</label>
                        <input type="file" name="gambar[]" id="gambar" class="form-control-file" multiple>
                        <small class="form-text text-muted">Unggah gambar baru (jpeg, png, jpg, gif)</small>
                    </div>
                    <div class="form-group col-12">
                        <label for="gambar_lama">Gambar Lama</label>
                        @if ($destinasiWisata->gambar)
                        <div class="row">
                            @foreach (json_decode($destinasiWisata->gambar) as $imagePath)
                            <div class="col-xs-6 col-sm-4 col-md-4 col-xl-3 mb-5 border-bottom-0">
                                <img src="{{ asset('storage/' . $imagePath) }}" alt="Gambar Lama" class="img-fluid" style="max-height: 200px;">
                            </div>
                            @endforeach
                        </div>

                        @else
                        <p>Tidak ada gambar lama.</p>
                        @endif
                    </div>
                    
                </div>
                
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>

            </div>
    </div>
</div>

@endsection


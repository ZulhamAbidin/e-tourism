@extends('layouts.main')

@section('container')
<div class="main-container container-fluid">

    <div class="page-header">
        <h1 class="page-title">Edit Kebudayaan</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Kebudayaan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">

            </div>

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Kebudayaan</h4>
                </div>

                <div class="card-body">
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    <form action="{{ route('destinasi-kebudayaan.update', ['id' => $kebudayaan->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama">Nama Kebudayaan</label>
                            <input type="text" name="nama" id="nama" class="form-control"
                                value="{{ $kebudayaan->nama }}" required>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">keterangan</label>
                            <textarea name="keterangan" id="keterangan"
                                class="form-control">{{ $kebudayaan->keterangan }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="gambar">Gambar Baru</label>
                            <input type="file" name="gambar[]" id="gambar" class="form-control-file" multiple>
                            <small class="form-text text-muted">Unggah gambar baru (jpeg, png, jpg, gif)</small>
                        </div>
                        <div class="form-group">
                            <label for="gambar_lama">Gambar Lama</label>
                            @if ($kebudayaan->gambar)
                            <div class="row">
                                @foreach (json_decode($kebudayaan->gambar) as $imagePath)
                                <div class="col-xs-6 col-sm-4 col-md-4 col-xl-3 mb-5 border-bottom-0">
                                    <img src="{{ asset('storage/' . $imagePath) }}" alt="Gambar Lama" class="img-fluid"
                                        style="max-height: 200px;">
                                </div>
                                @endforeach
                            </div>
                            @else
                            <p>Tidak ada gambar lama.</p>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

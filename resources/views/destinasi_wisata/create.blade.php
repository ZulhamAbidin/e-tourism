@extends('layouts.main')

@section('container')
    <div class="main-container container-fluid">

        <div class="page-header">
            <h1 class="page-title">Tambah Destinasi Wisata</h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Destinasi</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12">

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Destinasi Wisata</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('destinasi-wisata.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama Destinasi Wisata</label>
                                <input type="text" value="" required name="nama" id="nama"
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" value="" required name="alamat" id="alamat"
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="keterangan">keterangan</label>
                                <textarea name="keterangan" required id="keterangan" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <input type="file" name="gambar[]" required id="gambar" class="form-control-file" multiple>
                                <small class="form-text text-muted" >Unggah gambar baru Maksimal 4 Gambar (jpeg, png, jpg, gif)</small>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>

                        <div class="form-group mt-4">
                            <div id="map" style="height: 400px;"></div>
                        </div>
                    

                    </div>
                </div>
            </div>
        </div>

    </div>

    

@endsection



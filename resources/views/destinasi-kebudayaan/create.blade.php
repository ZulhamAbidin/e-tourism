@extends('layouts.main')

@section('container')
    <div class="main-container container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Data Kebudayaan</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('destinasi-kebudayaan.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama Kebudayaan</label>
                                <input type="text" required name="nama" id="nama" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="keterangan">keterangan</label>
                                <textarea name="keterangan" required id="keterangan" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <input type="file" name="gambar[]" required id="gambar" class="form-control-file"
                                    multiple>
                                <small class="form-text text-muted">Unggah gambar baru Maksimal 4 Gambar (jpeg, png, jpg, gif)</small>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

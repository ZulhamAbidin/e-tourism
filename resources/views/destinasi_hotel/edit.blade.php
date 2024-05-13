

@extends('layouts.main')

@section('container')
<div class="main-container container-fluid">

    <div class="page-header">
        <h1 class="page-title">Edit Destinasi Penginapan</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Destinasi</a></li>
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
                    <h4 class="card-title">Edit Destinasi Penginapan</h4>
                </div>

                <div class="card-body">
                  @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
                @endif
                <form action="{{ route('destinasi-hotel.update', ['id' => $destinasihotel->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama">Nama Destinasi Penginapan</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="{{ $destinasihotel->nama }}" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" id="alamat" class="form-control" value="{{ $destinasihotel->alamat }}"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar Baru</label>
                        <input type="file" name="gambar[]" id="gambar" class="form-control-file" multiple>
                        <small class="form-text text-muted">Unggah gambar baru (jpeg, png, jpg, gif)</small>
                    </div>
                    <div class="form-group">
                        <label for="gambar_lama">Gambar Lama</label>
                        @if ($destinasihotel->gambar)
                        <div class="row">
                            @foreach (json_decode($destinasihotel->gambar) as $imagePath)
                            <div class="col-xs-6 col-sm-4 col-md-4 col-xl-3 mb-5 border-bottom-0">
                                <img src="{{ asset('storage/' . $imagePath) }}" alt="Gambar Lama" class="img-fluid" style="max-height: 200px;">
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
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


@if ($errors->any())
<script>
    var errorMessage = "<ul>";
            @foreach ($errors->all() as $error)
                errorMessage += "<li>{{ $error }}</li>";
            @endforeach
            errorMessage += "</ul>";

            Swal.fire({
                title: "Error",
                html: errorMessage,
                icon: "error",
                timer: 15000,
                showConfirmButton: false
            });
</script>
@endif



@if (session('error'))
<script>
    Swal.fire({
                title: "Gagal",
                text: "{{ session('error') }}",
                icon: "error",
                timer: 3000,
                showConfirmButton: false
            });
</script>
@endif

@endpush
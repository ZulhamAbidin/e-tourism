@extends('layouts.main')

@section('container')
    <div class="main-container container-fluid">

        <div class="page-header">
            <h1 class="page-title">List Kebudayaan</h1>
            <div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Destinasi</a></li>
                    <li class="breadcrumb-item active" aria-current="page">List</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List Kebudayaan</h4>
                    </div>

                    <div class="card-body">
                        <div class="side-app">
                            <!-- PAGE-HEADER -->
                            <div class="page-header">
                                <h1 class="page-title">Kebudayaan</h1>
                                <div>
                                    <div class="breadcrumb">
                                        <a href="{{ route('destinasi-kebudayaan.create') }}" class="btn btn-primary"><i
                                                class="fa fa-plus-square me-2"></i>Tambah Kebudayaan</a>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                @foreach ($kebudayaanList as $kebudayaan)
                                    <div class="col-sm-6 col-md-12 col-lg-3 col-xl-6">
                                        <div class="card"> <a href=""><img class="card-img-top"
                                                    src="{{ url('storage/' . $kebudayaan->sampul) }}"
                                                    alt="And this isn't my nose. This is a false one."></a>
                                            <div class="card-body d-flex flex-column">
                                                <h3>{{ $kebudayaan->nama }}</a></h3>
                                                <small
                                                    class="d-block text-muted">{{ \Carbon\Carbon::parse($kebudayaan->created_at)->locale('id')->diffForHumans() }}</small>
                                                <div class="text-muted pt-2">{{ $kebudayaan->alamat }}</div>
                                                <div class="text-muted pt-2 text-justify">
                                                    {{ Str::limit($kebudayaan->deskripsi, 500) }}</div>
                                                <div class="d-flex align-items-center pt-5 mt-auto">
                                                    <div class="ms-auto">

                                                        <a href="{{ route('pengunjung.kebudayaan.show', $kebudayaan) }}"
                                                            class="btn btn-primary">Lihat</a>
                                                            
                                                        <a href="{{ route('destinasi-kebudayaan.edit', ['id' => $kebudayaan->id]) }}"
                                                            class="btn btn-warning">Edit</a>
                                                        <form
                                                            action="{{ route('destinasi-kebudayaan.destroy', ['id' => $kebudayaan->id]) }}"
                                                            method="POST" style="display: inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger"
                                                                onclick="return confirmDelete(event)">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                title: "Berhasil",
                text: "{{ session('success') }}",
                icon: "success",
                timer: 3000,
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
    
    <script>
        function confirmDelete(event) {
            event.preventDefault(); // Tambahkan baris ini untuk mencegah penghapusan langsung

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Destinasi wisata ini akan dihapus!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Lanjutkan proses hapus dengan mengirimkan form
                    event.target.closest('form').submit();
                } else {
                    // Batalkan proses hapus
                    return false;
                }
            });
        }
    </script>
@endpush

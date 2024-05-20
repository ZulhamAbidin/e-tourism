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
                                <table class="table table-striped mt-3">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kebudayaanList as $kebudayaan)
                                            <tr>
                                                <td>{{ $kebudayaan->nama }}</td>
                                                <td>{{ Str::limit($kebudayaan->keterangan, 500) }}</td>
                                                <td>
                                                    <a href="{{ route('pengunjung.kebudayaan.show', $kebudayaan) }}" class="btn btn-primary btn-sm">Lihat</a>
                                                    <a href="{{ route('destinasi-kebudayaan.edit', ['id' => $kebudayaan->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                                                    <form action="{{ route('destinasi-kebudayaan.destroy', ['id' => $kebudayaan->id]) }}" method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirmDelete(event)">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
            event.preventDefault(); 

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
                    event.target.closest('form').submit();
                } else {
                    return false;
                }
            });
        }
    </script>
@endpush

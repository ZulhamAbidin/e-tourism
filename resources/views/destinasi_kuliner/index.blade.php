@extends('layouts.main')

@section('container')
    <div class="main-container container-fluid">

        <div class="page-header">
            <h1 class="page-title">List Destinasi Kuliner</h1>
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
                        <h4 class="card-title">List Destinasi Kuliner</h4>
                    </div>

                    <div class="card-body">
                       

                        <div class="side-app">

                            <!-- CONTAINER -->

                            <!-- PAGE-HEADER -->
                            <div class="page-header">
                                <h1 class="page-title">Destinasi Kuliner</h1>
                                <div>
                                    <div class="breadcrumb">
                                        <a href="{{ route('destinasi-kuliner.create') }}" class="btn btn-primary"><i
                                                class="fa fa-plus-square me-2"></i>Tambah Destinasi</a>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                @foreach ($destinasiKulinerList as $destinasiKuliner)
                                    <div class="col-sm-6 col-md-12 col-lg-3 col-xl-6">
                                        <div class="card"> <a href=""><img class="card-img-top"
                                                    src="{{ url('storage/' . $destinasiKuliner->sampul) }}"
                                                    alt="And this isn't my nose. This is a false one."></a>
                                            <div class="card-body d-flex flex-column">
                                                <h3>{{ $destinasiKuliner->nama }}</a></h3>
                                                <small
                                                    class="d-block text-muted">{{ \Carbon\Carbon::parse($destinasiKuliner->created_at)->locale('id')->diffForHumans() }}</small>
                                                <div class="text-muted pt-2">{{ $destinasiKuliner->alamat }}</div>
                                                <div class="text-muted pt-2 text-justify">
                                                    {{ Str::limit($destinasiKuliner->Deskripsi, 500) }}</div>
                                                <div class="d-flex align-items-center pt-5 mt-auto">
                                                    <div class="ms-auto">
                                                        <a href="{{ route('pengunjung.kuliner.show', $destinasiKuliner) }}"
                                                            class="btn btn-primary">Lihat</a>
                                                        <a href="{{ route('destinasi-kuliner.edit', ['id' => $destinasiKuliner->id]) }}"
                                                            class="btn btn-warning">Edit</a>
                                                        <form
                                                            action="{{ route('destinasi-kuliner.destroy', ['id' => $destinasiKuliner->id]) }}"
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
                    text: 'Destinasi Kuliner ini akan dihapus!',
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

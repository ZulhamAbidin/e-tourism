@extends('layouts.main')

@section('container')
<div class="main-container container-fluid">

    <div class="page-header">
        <h1 class="page-title">List Users</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Users</a></li>
                <li class="breadcrumb-item active" aria-current="page">List</li>
            </ol>
        </div>
    </div>

    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="container">

                <div>
                    <div class="breadcrumb">
                        <a href="{{ route ('register')}}" class="btn btn-primary"><i class="fa fa-plus-square me-2"></i>Tambah
                            Users</a>
                    </div>
                </div>
        
        
                <div class="page-header">
                    <h1 class="page-title">Users Admin</h1>
                </div>
        
                <div class="row">
                    <table class="table stripped responsive-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>NoHp</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users_admin as $user_admin)
                            <tr>
                                <td>{{ $user_admin->name }}</td>
                                <td>{{ $user_admin->email }}</td>
                                <td>{{ $user_admin->alamat }}</td>
                                <td>{{ $user_admin->nohp }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        
                <div class="page-header">
                    <h1 class="page-title">Users Pengunjung</h1>
                </div>
        
                <div class="row">
                    <table class="table stripped responsive-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>NoHp</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users_pengunjung as $user_pengunjung)
                            <tr>
                                <td>{{ $user_pengunjung->name }}</td>
                                <td>{{ $user_pengunjung->email }}</td>
                                <td>{{ $user_pengunjung->alamat }}</td>
                                <td>{{ $user_pengunjung->nohp }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
            text: 'Destinasi Hotel ini akan dihapus!',
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

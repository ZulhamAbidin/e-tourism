<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RootController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KebudayaanController;
use App\Http\Controllers\DestinasiHotelController;
use App\Http\Controllers\DestinasiWisataController;
use App\Http\Controllers\PengunjungHotelController;
use App\Http\Controllers\DestinasiKulinerController;
use App\Http\Controllers\PengunjungWisataController;
use App\Http\Controllers\PengunjungKulinerController;
use App\Http\Controllers\DeskripsiKabupatenController;
use App\Http\Controllers\DestinasiKebudayaanController;
use App\Http\Controllers\PengunjungKebudayaanController;



// Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index')->middleware(['auth', 'verified']);


Route::get('/', [RootController::class, 'index'])->name('deskripsi.index');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware(['auth', 'verified']);



// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// DestinasiWisata
Route::middleware(['auth'])->group(function () {
    Route::get('/destinasi-wisata', [DestinasiWisataController::class, 'index'])->name('destinasi-wisata.index');
    Route::get('/destinasi-wisata/create', [DestinasiWisataController::class, 'create'])->name('destinasi-wisata.create');
    Route::post('/destinasi-wisata', [DestinasiWisataController::class, 'store'])->name('destinasi-wisata.store');
    Route::get('/destinasi-wisata/{id}', [DestinasiWisataController::class, 'show'])->name('destinasi-wisata.show');
    Route::get('/destinasi-wisata/{id}/edit', [DestinasiWisataController::class, 'edit'])->name('destinasi-wisata.edit');
    Route::delete('/destinasi-wisata/{id}', [DestinasiWisataController::class, 'destroy'])->name('destinasi-wisata.destroy');
    Route::put('/destinasi-wisata/{id}', [DestinasiWisataController::class, 'update'])->name('destinasi-wisata.update');
});

Route::get('/wisata', [PengunjungWisataController::class, 'index'])->name('pengunjung.destinasi.index');
Route::get('/wisata/{destinasiWisata}', [PengunjungWisataController::class, 'show'])->name('pengunjung.destinasi.show');
Route::post('/wisata/{destinasiWisata}/tambah-komentar', [PengunjungWisataController::class, 'tambahKomentar'])->name('pengunjung.destinasi.tambah-komentar');

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// DestinasiKuliner
Route::middleware(['auth'])->group(function () {
    Route::get('/destinasi-kuliner', [DestinasiKulinerController::class, 'index'])->name('destinasi-kuliner.index');
    Route::get('/destinasi-kuliner/create', [DestinasiKulinerController::class, 'create'])->name('destinasi-kuliner.create');
    Route::post('/destinasi-kuliner', [DestinasiKulinerController::class, 'store'])->name('destinasi-kuliner.store');
    Route::get('/destinasi-kuliner/{id}', [DestinasiKulinerController::class, 'show'])->name('destinasi-kuliner.show');
    Route::get('/destinasi-kuliner/{id}/edit', [DestinasiKulinerController::class, 'edit'])->name('destinasi-kuliner.edit');
    Route::delete('/destinasi-kuliner/{id}', [DestinasiKulinerController::class, 'destroy'])->name('destinasi-kuliner.destroy');
    Route::put('/destinasi-kuliner/{id}', [DestinasiKulinerController::class, 'update'])->name('destinasi-kuliner.update');
});

Route::get('/kuliner', [PengunjungKulinerController::class, 'index'])->name('pengunjung.kuliner.index');
Route::get('/kuliner/{destinasiKuliner}', [PengunjungKulinerController::class, 'show'])->name('pengunjung.kuliner.show');
Route::post('/kuliner/{destinasiKuliner}/tambah-komentar', [PengunjungKulinerController::class, 'tambahKomentar'])->name('pengunjung.kuliner.tambah-komentar');

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// DestinasiHotel
Route::middleware(['auth'])->group(function () {
    Route::get('/destinasi-hotel', [DestinasiHotelController::class, 'index'])->name('destinasi-hotel.index');
    Route::get('/destinasi-hotel/create', [DestinasiHotelController::class, 'create'])->name('destinasi-hotel.create');
    Route::post('/destinasi-hotel', [DestinasiHotelController::class, 'store'])->name('destinasi-hotel.store');
    Route::get('/destinasi-hotel/{id}', [DestinasiHotelController::class, 'show'])->name('destinasi-hotel.show');
    Route::get('/destinasi-hotel/{id}/edit', [DestinasiHotelController::class, 'edit'])->name('destinasi-hotel.edit');
    Route::delete('/destinasi-hotel/{id}', [DestinasiHotelController::class, 'destroy'])->name('destinasi-hotel.destroy');
    Route::put('/destinasi-hotel/{id}', [DestinasiHotelController::class, 'update'])->name('destinasi-hotel.update');
});

Route::get('/hotel', [PengunjungHotelController::class, 'index'])->name('pengunjung.hotel.index');
Route::get('/hotel/{destinasihotel}', [PengunjungHotelController::class, 'show'])->name('pengunjung.hotel.show');
Route::post('/hotel/{destinasihotel}/tambah-komentar', [PengunjungHotelController::class, 'tambahKomentar'])->name('pengunjung.hotel.tambah-komentar');

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::middleware(['auth'])->group(function () {
    Route::get('/destinasi-kebudayaan/create', [DestinasiKebudayaanController::class, 'create'])->name('destinasi-kebudayaan.create');
    Route::post('/destinasi-kebudayaan', [DestinasiKebudayaanController::class, 'store'])->name('destinasi-kebudayaan.store');
    Route::get('/destinasi-kebudayaan/{id}', [DestinasiKebudayaanController::class, 'show'])->name('destinasi-kebudayaan.show');
    Route::get('/destinasi-kebudayaan', [DestinasiKebudayaanController::class, 'index'])->name('destinasi-kebudayaan.index');
    Route::get('/destinasi-kebudayaan/{id}/edit', [DestinasiKebudayaanController::class, 'edit'])->name('destinasi-kebudayaan.edit');
    Route::put('/destinasi-kebudayaan/{id}', [DestinasiKebudayaanController::class, 'update'])->name('destinasi-kebudayaan.update');
    Route::delete('/destinasi-kebudayaan/{id}', [DestinasiKebudayaanController::class, 'destroy'])->name('destinasi-kebudayaan.destroy');
});


Route::get('/kebudayaan', [PengunjungKebudayaanController::class, 'index'])->name('pengunjung.kebudayaan.index');
Route::get('/kebudayaan/{destinasikebudayaan}', [PengunjungKebudayaanController::class, 'show'])->name('pengunjung.kebudayaan.show');
Route::post('/kebudayaan/{destinasikebudayaan}/tambah-komentar', [PengunjungKebudayaanController::class, 'tambahKomentar'])->name('pengunjung.kebudayaan.tambah-komentar');


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::middleware(['auth'])->group(function () {
    Route::get('/visimisi', [DeskripsiKabupatenController::class, 'index'])->name('visimisi.index');
    Route::get('/visimisi/create', [DeskripsiKabupatenController::class, 'create'])->name('visimisi.create');
    Route::post('/visimisi/store', [DeskripsiKabupatenController::class, 'store'])->name('visimisi.store');
    Route::get('/visimisi/{deskripsiKabupaten}/edit', [DeskripsiKabupatenController::class, 'edit'])->name('visimisi.edit');
    Route::put('/visimisi/{deskripsiKabupaten}/update', [DeskripsiKabupatenController::class, 'update'])->name('visimisi.update');
    Route::delete('/visimisi/{deskripsiKabupaten}/destroy', [DeskripsiKabupatenController::class, 'destroy'])->name('visimisi.destroy');
});


// Jika Anda ingin menampilkan list deskripsi, tambahkan rute ini
Route::get('/deskripsi', [DeskripsiKabupatenController::class, 'index2'])->name('deskripsi.index2');
 

require __DIR__ . '/auth.php';

<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use Illuminate\Http\Request;
use App\Models\DeskripsiKabupaten;
use App\Models\DestinasiKuliner;
use App\Models\DestinasiHotel;
use App\Models\Kebudayaan;
use App\Models\DestinasiWisata;
use Illuminate\Database\Eloquent\Collection;


class RootController extends Controller
{
 public function index()
{
    $data = DeskripsiKabupaten::all();

    // Mengambil semua postingan dari tabel komentars beserta ratingnya dan data nama destinasi serta deskripsi
    $posts = Komentar::with(['kebudayaan', 'destinasiWisata', 'destinasiKuliner', 'destinasiHotel'])
        ->select('komentars.*', 'kebudayaan.nama as nama_kebudayaan', 'kebudayaan.deskripsi as deskripsi_kebudayaan',
                 'destinasi_wisata.nama as nama_wisata', 'destinasi_wisata.deskripsi as deskripsi_wisata',
                 'destinasi_kuliner.nama as nama_kuliner', 'destinasi_kuliner.deskripsi as deskripsi_kuliner',
                 'destinasi_hotel.nama as nama_hotel', 'destinasi_hotel.deskripsi as deskripsi_hotel')
        ->leftJoin('kebudayaan', 'komentars.kebudayaan_id', '=', 'kebudayaan.id')
        ->leftJoin('destinasi_wisata', 'komentars.destinasi_wisata_id', '=', 'destinasi_wisata.id')
        ->leftJoin('destinasi_kuliner', 'komentars.destinasi_kuliner_id', '=', 'destinasi_kuliner.id')
        ->leftJoin('destinasi_hotel', 'komentars.destinasi_hotel_id', '=', 'destinasi_hotel.id')
        ->orderByDesc('rating')
        ->get();

    return view('welcome', compact('posts', 'data'));
}
}
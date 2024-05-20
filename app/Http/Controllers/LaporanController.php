<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DestinasiWisata;
use App\Models\DestinasiKuliner;
use App\Models\DestinasiHotel;
use App\Models\Kebudayaan;

class LaporanController extends Controller
{
    public function index()
    {
        $destinasiWisata = DestinasiWisata::all();
        $destinasiKuliner = DestinasiKuliner::all();
        $destinasiHotel = DestinasiHotel::all();
        $kebudayaan = Kebudayaan::all();

        return view('laporan.index', compact('destinasiWisata', 'destinasiKuliner', 'destinasiHotel', 'kebudayaan'));
    }
}

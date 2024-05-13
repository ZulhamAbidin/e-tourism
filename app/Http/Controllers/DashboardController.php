<?php

namespace App\Http\Controllers;

// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DestinasiWisata;
use App\Models\DestinasiKuliner;
use App\Models\DestinasiHotel;
use App\Models\Kebudayaan;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil data destinasi wisata
        $destinasiWisata = DestinasiWisata::all();
        $totalDestinasiWisata = $destinasiWisata->count();

        // Mengambil data destinasi kuliner
        $destinasiKuliner = DestinasiKuliner::all();
        $totalDestinasiKuliner = $destinasiKuliner->count();

        // Mengambil data destinasi hotel
        $destinasiHotel = DestinasiHotel::all();
        $totalDestinasiHotel = $destinasiHotel->count();

        // Mengambil data kebudayaan
        $kebudayaan = Kebudayaan::all();
        $totalKebudayaan = $kebudayaan->count();

        return view('dashboard', compact(
            'destinasiWisata',
            'totalDestinasiWisata',
            'destinasiKuliner',
            'totalDestinasiKuliner',
            'destinasiHotel',
            'totalDestinasiHotel',
            'kebudayaan',
            'totalKebudayaan'
        ));
    }
}


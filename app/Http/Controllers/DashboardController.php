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
        $destinasiWisata = DestinasiWisata::all();
        $totalDestinasiWisata = $destinasiWisata->count();

        $destinasiKuliner = DestinasiKuliner::all();
        $totalDestinasiKuliner = $destinasiKuliner->count();

        $destinasiHotel = DestinasiHotel::all();
        $totalDestinasiHotel = $destinasiHotel->count();

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


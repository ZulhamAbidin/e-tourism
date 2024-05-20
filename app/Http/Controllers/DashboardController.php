<?php

namespace App\Http\Controllers;

// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DestinasiWisata;
use App\Models\DestinasiKuliner;
use App\Models\DestinasiHotel;
use App\Models\Kebudayaan;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Memeriksa apakah pengguna adalah admin
        if (Auth::user()->is_admin) {
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
        } else {
            return redirect('/')
                ->with('status', 'success')
                ->with('message', 'Anda login sebagai pengunjung. Anda dapat berkomentar.');
        }
    }
}


<?php

namespace App\Http\Controllers;

use App\Models\DestinasiHotel;
use App\Models\Komentar;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\QueryException;

class PengunjungHotelController extends Controller
{
    public function index()
    {
        $destinasihotelList = DestinasiHotel::all();
        return view('hotel.hotel_list', compact('destinasihotelList'));
    }

    public function show(DestinasiHotel $destinasihotel)
    {
        $daftarhotelTerbaru = DestinasiHotel::where('id', '!=', $destinasihotel->id)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();


        return view('hotel.hotel_detail', compact('destinasihotel'));
    }

}

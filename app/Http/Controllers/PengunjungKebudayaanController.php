<?php

namespace App\Http\Controllers;

use App\Models\Kebudayaan;
use App\Models\Komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class PengunjungKebudayaanController extends Controller
{
    public function index()
    {
        $destinasikebudayaanList = Kebudayaan::all();
        return view('kebudayaan.kebudayaan_list', compact('destinasikebudayaanList'));
    }

    public function show(Kebudayaan $destinasikebudayaan)
    {
        $daftarkebudayaanTerbaru = Kebudayaan::where('id', '!=', $destinasikebudayaan->id)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('kebudayaan.kebudayaan_detail', compact('destinasikebudayaan'));
    }
}

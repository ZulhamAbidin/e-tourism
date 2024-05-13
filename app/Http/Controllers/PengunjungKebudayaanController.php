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

        $totalRating = $this->totalRating($destinasikebudayaan);
        $averageRating = $this->averageRating($destinasikebudayaan);
        $comments = $destinasikebudayaan->komentars;

        return view('kebudayaan.kebudayaan_detail', compact('destinasikebudayaan', 'daftarkebudayaanTerbaru', 'totalRating', 'averageRating', 'comments'));
    }

    public function totalRating(Kebudayaan $destinasikebudayaan)
    {
        return $destinasikebudayaan->komentars()->sum('rating');
    }

    public function averageRating(Kebudayaan $destinasikebudayaan)
    {
        $totalRating = $this->totalRating($destinasikebudayaan);
        $totalKomentar = $destinasikebudayaan->komentars()->count();

        if ($totalKomentar > 0) {
            return $totalRating / $totalKomentar;
        } else {
            return 0;
        }
    }

    public function tambahKomentar(Request $request, Kebudayaan $destinasikebudayaan)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'regex:/^[a-zA-Z\s]+$/'], 
            'isi_komentar' => 'required',
            'email' => 'required',
            'rating' => 'required|numeric|min:1|max:5', 
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $komentar = new Komentar([
            'nama' => $request->input('nama'),
            'isi_komentar' => $request->input('isi_komentar'),
            'email' => $request->input('email'),
            'rating' => $request->input('rating'),
        ]);

        $destinasikebudayaan->komentars()->save($komentar);

        $averageRating = $destinasikebudayaan->komentars->avg('rating');
        $destinasikebudayaan->update([
            'rating' => $averageRating,
        ]);

        return redirect()
            ->back()
            ->with('success', 'Komentar dan rating berhasil ditambahkan.');
    }
}

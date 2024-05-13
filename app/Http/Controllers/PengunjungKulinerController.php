<?php

namespace App\Http\Controllers;

use App\Models\DestinasiKuliner;
use App\Models\Komentar;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\QueryException;

class PengunjungKulinerController extends Controller
{
    public function index()
    {
        $destinasiKulinerList = DestinasiKuliner::all();
        return view('kuliner.kuliner_list', compact('destinasiKulinerList'));
    }

    public function show(DestinasiKuliner $destinasiKuliner)
    {
        $daftarKulinerTerbaru = DestinasiKuliner::where('id', '!=', $destinasiKuliner->id)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        $totalRating = $this->totalRating($destinasiKuliner);
        $averageRating = $this->averageRating($destinasiKuliner);
        $comments = $destinasiKuliner->komentars;

        return view('kuliner.kuliner_detail', compact('destinasiKuliner', 'daftarKulinerTerbaru', 'totalRating', 'averageRating', 'comments'));
    }

    public function totalRating(DestinasiKuliner $destinasiKuliner)
    {
        return $destinasiKuliner->komentars()->sum('rating');
    }

    public function averageRating(DestinasiKuliner $destinasiKuliner)
    {
        $totalRating = $this->totalRating($destinasiKuliner);
        $totalKomentar = $destinasiKuliner->komentars()->count();

        if ($totalKomentar > 0) {
            return $totalRating / $totalKomentar;
        } else {
            return 0;
        }
    }

    public function tambahKomentar(Request $request, DestinasiKuliner $destinasiKuliner)
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

    $destinasiKuliner->komentars()->save($komentar);

    $averageRating = $destinasiKuliner->komentars->avg('rating');
    $destinasiKuliner->update([
        'rating' => $averageRating,
    ]);

    return redirect()
        ->back()
        ->with('success', 'Komentar dan rating berhasil ditambahkan.');
}

}

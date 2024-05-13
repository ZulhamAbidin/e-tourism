<?php

namespace App\Http\Controllers;

use App\Models\DestinasiWisata;
use App\Models\Komentar;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\QueryException;

class PengunjungWisataController extends Controller
{
    public function index()
    {
        $destinasiWisataList = DestinasiWisata::all();
        return view('wisata.wisata_list', compact('destinasiWisataList'));
    }

    public function show(DestinasiWisata $destinasiWisata)
    {
        $daftarPostinganTerbaru = DestinasiWisata::where('id', '!=', $destinasiWisata->id)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

       
        $comments = $destinasiWisata->komentars;

        return view('wisata.wisata_detail', compact('destinasiWisata', 'comments'));
    }

    public function tambahKomentar(Request $request, DestinasiWisata $destinasiWisata)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'regex:/^[a-zA-Z\s]+$/'],
            'isi_komentar' => 'required',
            'email' => 'required',
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
        ]);

        $destinasiWisata->komentars()->save($komentar);

        // $averageRating = $destinasiWisata->komentars->avg('rating');
        // $destinasiWisata->update([
        //     'rating' => $averageRating,
        // ]);

        return redirect()
            ->back()
            ->with('success', 'Komentar dan rating berhasil ditambahkan.');
    }

}

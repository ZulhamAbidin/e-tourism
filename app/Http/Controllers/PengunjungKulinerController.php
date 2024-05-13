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

        $comments = $destinasiKuliner->komentars;

        return view('kuliner.kuliner_detail', compact('destinasiKuliner', 'comments'));
    }


    public function tambahKomentar(Request $request, DestinasiKuliner $destinasiKuliner)
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

    $destinasiKuliner->komentars()->save($komentar);

    return redirect()
        ->back()
        ->with('success', 'Komentar dan rating berhasil ditambahkan.');
}

}

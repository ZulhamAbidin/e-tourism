<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\DestinasiWisata;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class DestinasiWisataController extends Controller
{
    public function create()
    {
        return view('destinasi_wisata.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required|string|max:255',
                'alamat' => 'required|string|max:255',
                'keterangan' => 'nullable|string',
                'gambar' => 'nullable|array',
                'gambar.*' => 'image|mimes:jpeg,png,jpg,gif|max:20011248', 
            ],
            [
                'nama.required' => 'Pastikan Anda mengisi nama destinasi.',
                'alamat.required' => 'Pastikan Anda mengisi alamat destinasi.',
                'gambar.0.image' => 'Pastikan Anda Memilih gambar yang sesuai dengan format dan size yang telah ditentukan.',
                'gambar.0.mimes' => 'Pastikan Anda Memilih gambar dengan format: jpeg, png, jpg, gif.',
            ],
        );
        $nama = $request->input('nama');
        $alamat = $request->input('alamat');
        $keterangan = $request->input('keterangan');

        $destinasiWisata = new DestinasiWisata([
            'nama' => $nama,
            'alamat' => $alamat,
            'keterangan' => $keterangan,
        ]);

        if ($request->hasFile('gambar')) {
            $gambarPaths = [];
            foreach ($request->file('gambar') as $image) {
                $path = $image->store('images', 'public');
                $gambarPaths[] = $path;
            }

            $destinasiWisata->gambar = json_encode($gambarPaths);
        }

        if ($destinasiWisata->save()) {
            return redirect()
                ->route('destinasi-wisata.index')
                ->with('success', 'Destinasi wisata berhasil ditambahkan.');
        } else {
            return redirect()
                ->back()
                ->with('error', 'Gagal menambahkan destinasi wisata.');
        }
    }

    public function show($id)
    {
        $destinasiWisata = DestinasiWisata::find($id);

        if (!$destinasiWisata) {
            return redirect()
                ->route('destinasi-wisata.index')
                ->with('error', 'Destinasi wisata tidak ditemukan.');
        }

        return view('destinasi_wisata.show', compact('destinasiWisata'));
    }


    public function index(Request $request)
    {
        $query = DestinasiWisata::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('nama', 'LIKE', '%' . $search . '%')->orWhere('alamat', 'LIKE', '%' . $search . '%');
        }

        $destinasiWisataList = $query->get();

        return view('destinasi_wisata.index', ['destinasiWisataList' => $destinasiWisataList]);
    }

   

    public function edit($id)
    {
        $destinasiWisata = DestinasiWisata::find($id);

        if (!$destinasiWisata) {
            return redirect()
                ->route('destinasi-wisata.index')
                ->with('error', 'Destinasi wisata tidak ditemukan.');
        }

        return view('destinasi_wisata.edit', compact('destinasiWisata'));
    }

    public function destroy($id)
    {
        $destinasiWisata = DestinasiWisata::find($id);

        if (!$destinasiWisata) {
            return redirect()
                ->route('destinasi-wisata.index')
                ->with('error', 'Destinasi wisata tidak ditemukan.');
        }

        $destinasiWisata->delete();

        return redirect()
            ->route('destinasi-wisata.index')
            ->with('success', 'Destinasi wisata berhasil dihapus.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'keterangan' => 'nullable|string',
            'gambar' => 'nullable|array',
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif|max:2012148',
        ]);

        $destination = DestinasiWisata::find($id);

        $destination->nama = $request->input('nama');
        $destination->alamat = $request->input('alamat');
        $destination->keterangan = $request->input('keterangan');

        

        if ($request->hasFile('gambar')) {
            if (!empty($destination->gambar)) {
                $oldImages = json_decode($destination->gambar, true);
                foreach ($oldImages as $oldImage) {
                    Storage::disk('public')->delete($oldImage);
                }
            }

            $gambarPaths = [];
            foreach ($request->file('gambar') as $image) {
                $path = $image->store('images', 'public');
                $gambarPaths[] = $path;
            }

            $destination->gambar = json_encode($gambarPaths);
        }

        $destination->save();

        return redirect()
            ->route('destinasi-wisata.index')
            ->with('success', 'Destinasi Wisata berhasil diupdate.');
    }
}

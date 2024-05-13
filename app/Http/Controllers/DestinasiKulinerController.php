<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\DestinasiKuliner;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class DestinasiKulinerController extends Controller
{
    public function create()
    {

        return view('destinasi_kuliner.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'gambar' => 'nullable|array',
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif|max:20012148',
        ], [
            'nama.required' => 'Pastikan Anda mengisi nama destinasi kuliner.',
            'alamat.required' => 'Pastikan Anda mengisi alamat destinasi kuliner.',
            'gambar.0.image' => 'Pastikan Anda Memilih gambar yang sesuai dengan format dan size yang telah ditentukan.',
            'gambar.0.mimes' => 'Pastikan Anda Memilih gambar dengan format: jpeg, png, jpg, gif.',
        ]);

        $nama = $request->input('nama');
        $alamat = $request->input('alamat');
        $destinasiKuliner = new DestinasiKuliner([
            'nama' => $nama,
            'alamat' => $alamat,
        ]);

        if ($request->hasFile('gambar')) {
            $gambarPaths = [];
            foreach ($request->file('gambar') as $image) {
                $path = $image->store('images', 'public');
                $gambarPaths[] = $path;
            }

            $destinasiKuliner->gambar = json_encode($gambarPaths);
        }

        if ($destinasiKuliner->save()) {
            return redirect()
                ->route('destinasi-kuliner.index')
                ->with('success', 'Destinasi kuliner berhasil ditambahkan.');
        } else {
            return redirect()
                ->back()
                ->with('error', 'Gagal menambahkan destinasi kuliner.');
        }
    }

    public function show($id)
    {
        $destinasiKuliner = DestinasiKuliner::find($id);

        if (!$destinasiKuliner) {
            return redirect()
                ->route('destinasi-kuliner.index')
                ->with('error', 'Destinasi kuliner tidak ditemukan.');
        }

        return view('destinasi_kuliner.show', compact('destinasiKuliner'));
    }

    public function index()
    {
        $destinasiKulinerList = DestinasiKuliner::all();

        return view('destinasi_kuliner.index', ['destinasiKulinerList' => $destinasiKulinerList]);
    }

    public function edit($id)
    {
        $destinasiKuliner = DestinasiKuliner::find($id);

        if (!$destinasiKuliner) {
            return redirect()
                ->route('destinasi-kuliner.index')
                ->with('error', 'Destinasi kuliner tidak ditemukan.');
        }

        return view('destinasi_kuliner.edit', compact('destinasiKuliner'));
    }

    public function destroy($id)
    {
        $destinasiKuliner = DestinasiKuliner::find($id);

        if (!$destinasiKuliner) {
            return redirect()
                ->route('destinasi-kuliner.index')
                ->with('error', 'Destinasi kuliner tidak ditemukan.');
        }

        $destinasiKuliner->delete();

        return redirect()
            ->route('destinasi-kuliner.index')
            ->with('success', 'Destinasi kuliner berhasil dihapus.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'gambar' => 'nullable|array',
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif|max:2012148',
        ]);

        $destination = DestinasiKuliner::find($id);

        $destination->nama = $request->input('nama');
        $destination->alamat = $request->input('alamat');

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
            ->route('destinasi-kuliner.index')
            ->with('success', 'Destinasi Kuliner berhasil diupdate.');
    }
}

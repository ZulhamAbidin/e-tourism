<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\Kebudayaan; 
use Illuminate\Support\Facades\Storage;

class DestinasiKebudayaanController extends Controller 
{
    public function create()
    {

        return view('destinasi-kebudayaan.create'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'keterangan' => 'required|string',
            'gambar' => 'nullable|array',
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif|max:20041218',
        ], [
            'nama.required' => 'Pastikan Anda mengisi nama kebudayaan.',
            'keterangan.required' => 'Pastikan Anda mengisi keterangan kebudayaan.',
            'gambar.0.image' => 'Pastikan Anda memilih gambar yang sesuai dengan format dan ukuran yang diizinkan.',
            'gambar.0.mimes' => 'Pastikan Anda memilih gambar dengan format: jpeg, png, jpg, gif.',
        ]);

        $nama = $request->input('nama');
        $keterangan = $request->input('keterangan');

        $kebudayaan = new Kebudayaan([
            'nama' => $nama,
            'keterangan' => $keterangan,
        ]);

        if ($request->hasFile('gambar')) {
            $gambarPaths = [];
            foreach ($request->file('gambar') as $image) {
                $path = $image->store('images', 'public');
                $gambarPaths[] = $path;
            }

            $kebudayaan->gambar = json_encode($gambarPaths);
        }

        if ($kebudayaan->save()) {
            return redirect()
                ->route('destinasi-kebudayaan.index')
                ->with('success', 'Kebudayaan berhasil ditambahkan.');
        } else {
            return redirect()
                ->back()
                ->with('error', 'Gagal menambahkan kebudayaan.');
        }
    }

    public function show($id)
    {
        $kebudayaan = Kebudayaan::find($id);

        if (!$kebudayaan) {
            return redirect()
                ->route('kebudayaan.index')
                ->with('error', 'Kebudayaan tidak ditemukan.');
        }

        return view('destinasi-kebudayaan.show', compact('kebudayaan'));
    }

    public function index()
    {
        $kebudayaanList = Kebudayaan::all();

        return view('destinasi-kebudayaan.index', ['kebudayaanList' => $kebudayaanList]);
    }

    public function edit($id)
    {
        $kebudayaan = Kebudayaan::find($id);

        if (!$kebudayaan) {
            return redirect()
                ->route('kebudayaan.index')
                ->with('error', 'Kebudayaan tidak ditemukan.');
        }

        return view('destinasi-kebudayaan.edit', compact('kebudayaan'));
    }

    public function destroy($id)
    {
        $kebudayaan = Kebudayaan::find($id);

        if (!$kebudayaan) {
            return redirect()
                ->route('destinasi-kebudayaan.index')
                ->with('error', 'Kebudayaan tidak ditemukan.');
        }

        $kebudayaan->delete();

        return redirect()
            ->route('destinasi-kebudayaan.index')
            ->with('success', 'Kebudayaan berhasil dihapus.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'keterangan' => 'required',
            'gambar' => 'nullable|array',
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif|max:2121048',
        ]);

        $kebudayaan = Kebudayaan::find($id);

        $kebudayaan->nama = $request->input('nama');
        $kebudayaan->keterangan = $request->input('keterangan');

       

        if ($request->hasFile('gambar')) {
            if (!empty($kebudayaan->gambar)) {
                $oldImages = json_decode($kebudayaan->gambar, true);
                foreach ($oldImages as $oldImage) {
                    Storage::disk('public')->delete($oldImage);
                }
            }

            $gambarPaths = [];
            foreach ($request->file('gambar') as $image) {
                $path = $image->store('images', 'public');
                $gambarPaths[] = $path;
            }

            $kebudayaan->gambar = json_encode($gambarPaths);
        }

        $kebudayaan->save();
        
        return redirect()
            ->route('destinasi-kebudayaan.index')
            ->with('success', 'Kebudayaan berhasil diupdate.');
    }
}

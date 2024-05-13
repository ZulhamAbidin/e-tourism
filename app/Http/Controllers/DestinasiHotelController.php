<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\DestinasiHotel;
use Illuminate\Support\Facades\Storage;

class DestinasiHotelController extends Controller
{
    public function create()
    {
        return view('destinasi_hotel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'gambar' => 'nullable|array',
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif|max:20121248',
        ], [
            'nama.required' => 'Pastikan Anda mengisi nama destinasi Hotel.',
            'alamat.required' => 'Pastikan Anda mengisi alamat destinasi Hotel.',
            'gambar.0.image' => 'Pastikan Anda Memilih gambar yang sesuai dengan format dan size yang telah ditentukan.',
            'gambar.0.mimes' => 'Pastikan Anda Memilih gambar dengan format: jpeg, png, jpg, gif.',
        ]);

        $nama = $request->input('nama');
        $alamat = $request->input('alamat');

        $destinasihotel = new DestinasiHotel([
            'nama' => $nama,
            'alamat' => $alamat,
        ]);

        if ($request->hasFile('sampul')) {
            $sampulPath = $request->file('sampul')->store('images', 'public');
            $destinasihotel->sampul = $sampulPath;
        }

        if ($request->hasFile('gambar')) {
            $gambarPaths = [];
            foreach ($request->file('gambar') as $image) {
                $path = $image->store('images', 'public');
                $gambarPaths[] = $path;
            }

            $destinasihotel->gambar = json_encode($gambarPaths);
        }

        if ($destinasihotel->save()) {
            return redirect()
                ->route('destinasi-hotel.index')
                ->with('success', 'Destinasi Hotel berhasil ditambahkan.');
        } else {
            return redirect()
                ->back()
                ->with('error', 'Gagal menambahkan destinasi Hotel.');
        }
    }

    public function show($id)
    {
        $destinasihotel = DestinasiHotel::find($id);

        if (!$destinasihotel) {
            return redirect()
                ->route('destinasi-hotel.index')
                ->with('error', 'Destinasi Hotel tidak ditemukan.');
        }

        return view('destinasi_hotel.show', compact('destinasihotel'));
    }

    public function index()
    {
        $destinasihotelList = DestinasiHotel::all();

        return view('destinasi_Hotel.index', ['destinasihotelList' => $destinasihotelList]);
    }


    public function edit($id)
    {
        $destinasihotel = DestinasiHotel::find($id);

        if (!$destinasihotel) {
            return redirect()
                ->route('destinasi-hotel.index')
                ->with('error', 'Destinasi hotel tidak ditemukan.');
        }

        return view('destinasi_hotel.edit', compact('destinasihotel'));
    }

    public function destroy($id)
    {
        $destinasihotel = DestinasiHotel::find($id);

        if (!$destinasihotel) {
            return redirect()
                ->route('destinasi-hotel.index')
                ->with('error', 'Destinasi Hotel tidak ditemukan.');
        }

        $destinasihotel->delete();

        return redirect()
            ->route('destinasi-hotel.index')
            ->with('success', 'Destinasi Hotel berhasil dihapus.');
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'gambar' => 'nullable|array',
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif|max:20121248',
        ]);

        $destination = DestinasiHotel::find($id);

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
            ->route('destinasi-hotel.index')
            ->with('success', 'Destinasi Hotel berhasil diupdate.');
    }
}

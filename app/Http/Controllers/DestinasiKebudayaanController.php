<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\Kebudayaan; 
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class DestinasiKebudayaanController extends Controller // Ganti "DestinasiHotelController" menjadi "KebudayaanController"
{
    public function create()
    {

        return view('destinasi-kebudayaan.create'); // Ganti "destinasi_hotel.create" menjadi "kebudayaan.create"
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'Deskripsi' => 'required|string',
            'alamat' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'sampul' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20048', // Format dan ukuran gambar sampul yang diizinkan
            'gambar' => 'nullable|array',
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif|max:20048', // Format dan ukuran gambar yang diizinkan
        ], [
            'nama.required' => 'Pastikan Anda mengisi nama kebudayaan.',
            'Deskripsi.required' => 'Pastikan Anda mengisi Deskripsi kebudayaan.',
            'alamat.required' => 'Pastikan Anda mengisi alamat destinasi.',
            'latitude.required' => 'Pastikan Anda Memilih Lokasi Kebudayaan.',
            'longitude.required' => 'Pastikan Anda Memilih Lokasi Kebudayaan.',
            'gambar.0.image' => 'Pastikan Anda memilih gambar yang sesuai dengan format dan ukuran yang diizinkan.',
            'gambar.0.mimes' => 'Pastikan Anda memilih gambar dengan format: jpeg, png, jpg, gif.',
        ]);

        // Ambil data dari form
        $nama = $request->input('nama');
        $Deskripsi = $request->input('Deskripsi');
        $alamat = $request->input('alamat');
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        // Simpan data ke dalam database
        $kebudayaan = new Kebudayaan([
            'nama' => $nama,
            'Deskripsi' => $Deskripsi,
            'alamat' => $alamat,
            'latitude' => $latitude,
            'longitude' => $longitude,
        ]);

        // Upload dan simpan gambar sampul
        if ($request->hasFile('sampul')) {
            // Simpan gambar sampul ke dalam folder penyimpanan (misalnya folder public/images)
            $sampulPath = $request->file('sampul')->store('images', 'public');

            // Simpan path gambar sampul di kolom "sampul" pada tabel
            $kebudayaan->sampul = $sampulPath;
        }

        // Upload dan simpan gambar yang diunggah
        if ($request->hasFile('gambar')) {
            $gambarPaths = [];
            foreach ($request->file('gambar') as $image) {
                // Simpan gambar ke dalam folder penyimpanan (misalnya folder public/images)
                $path = $image->store('images', 'public');
                // Simpan path gambar baru di array
                $gambarPaths[] = $path;
            }

            // Convert the array of paths to JSON and store it in the database
            $kebudayaan->gambar = json_encode($gambarPaths);
        }

        if ($kebudayaan->save()) {
            // Tampilkan SweetAlert berhasil
            return redirect()
                ->route('destinasi-kebudayaan.index')
                ->with('success', 'Kebudayaan berhasil ditambahkan.');
        } else {
            // Tampilkan SweetAlert gagal
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
        // Validate the input data
        $request->validate([
            'nama' => 'required',
            'Deskripsi' => 'required',
            'alamat' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'sampul' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Format dan ukuran gambar sampul yang diizinkan
            'gambar' => 'nullable|array',
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Format dan ukuran gambar yang diizinkan
        ]);

        // Find the kebudayaan by ID
        $kebudayaan = Kebudayaan::find($id);

        // Update the kebudayaan data
        $kebudayaan->nama = $request->input('nama');
        $kebudayaan->Deskripsi = $request->input('Deskripsi');
        $kebudayaan->alamat = $request->input('alamat');
        $kebudayaan->longitude = $request->input('longitude');
        $kebudayaan->latitude = $request->input('latitude');

        // Process and update the uploaded images
        if ($request->hasFile('sampul')) {
            // Hapus sampul lama sebelum menyimpan sampul baru (optional)
            if ($kebudayaan->sampul) {
                Storage::disk('public')->delete($kebudayaan->sampul);
            }

            // Simpan sampul ke dalam penyimpanan (misalnya folder public/images)
            $sampulPath = $request->file('sampul')->store('images', 'public');
            // Simpan path sampul baru di kolom "sampul" pada tabel
            $kebudayaan->sampul = $sampulPath;
        }

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama sebelum menyimpan gambar baru (optional)
            if (!empty($kebudayaan->gambar)) {
                // Hapus gambar lama dari penyimpanan
                $oldImages = json_decode($kebudayaan->gambar, true);
                foreach ($oldImages as $oldImage) {
                    Storage::disk('public')->delete($oldImage);
                }
            }

            // In case multiple images are uploaded, store them in an array
            $gambarPaths = [];
            foreach ($request->file('gambar') as $image) {
                // Simpan gambar ke dalam penyimpanan (misalnya folder public/images)
                $path = $image->store('images', 'public');
                // Simpan path gambar baru di array
                $gambarPaths[] = $path;
            }

            // Convert the array of paths to JSON and store it in the database
            $kebudayaan->gambar = json_encode($gambarPaths);
        }

        // Save the updated data
        $kebudayaan->save();

        // Redirect to the index page with a success message if everything is fine
        return redirect()
            ->route('destinasi-kebudayaan.index')
            ->with('success', 'Kebudayaan berhasil diupdate.');
    }
}

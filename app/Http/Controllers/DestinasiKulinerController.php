<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\DestinasiKuliner;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

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
            'JamBuka' => 'nullable|string|max:255',
            'Deskripsi' => 'nullable|string',
            'MenuKuliner' => 'nullable|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'sampul' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20048', // Format dan ukuran gambar sampul yang diizinkan
            'gambar' => 'nullable|array',
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif|max:20048', // Format dan ukuran gambar yang diizinkan
        ], [
            'nama.required' => 'Pastikan Anda mengisi nama destinasi kuliner.',
            'alamat.required' => 'Pastikan Anda mengisi alamat destinasi kuliner.',
            'latitude.required' => 'Pastikan Anda Memilih Lokasi Destinasi Kuliner.',
            'longitude.required' => 'Pastikan Anda Memilih Lokasi Destinasi Kuliner.',
            'gambar.0.image' => 'Pastikan Anda Memilih gambar yang sesuai dengan format dan size yang telah ditentukan.',
            'gambar.0.mimes' => 'Pastikan Anda Memilih gambar dengan format: jpeg, png, jpg, gif.',
        ]);

        // Ambil data dari form
        $nama = $request->input('nama');
        $alamat = $request->input('alamat');
        $jamBuka = $request->input('JamBuka');
        $deskripsi = $request->input('Deskripsi');
        $menukuliner = $request->input('MenuKuliner');
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        // Simpan data ke dalam database
        $destinasiKuliner = new DestinasiKuliner([
            'nama' => $nama,
            'alamat' => $alamat,
            'JamBuka' => $jamBuka,
            'Deskripsi' => $deskripsi,
            'MenuKuliner' => $menukuliner,
            'latitude' => $latitude,
            'longitude' => $longitude,
        ]);

        // Upload dan simpan gambar sampul
        if ($request->hasFile('sampul')) {
            // Simpan gambar sampul ke dalam folder penyimpanan (misalnya folder public/images)
            $sampulPath = $request->file('sampul')->store('images', 'public');

            // Simpan path gambar sampul di kolom "sampul" pada tabel
            $destinasiKuliner->sampul = $sampulPath;
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
            $destinasiKuliner->gambar = json_encode($gambarPaths);
        }

        if ($destinasiKuliner->save()) {
            // Tampilkan SweetAlert berhasil
            return redirect()
                ->route('destinasi-kuliner.index')
                ->with('success', 'Destinasi kuliner berhasil ditambahkan.');
        } else {
            // Tampilkan SweetAlert gagal
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

    private function geocodeAlamat($alamat)
    {
        $url = 'https://nominatim.openstreetmap.org/search?q=' . urlencode($alamat) . '&format=json';

        try {
            // Periksa apakah ada batas waktu timeout untuk permintaan (opsional)
            $response = Http::timeout(10)->get($url, [
                'headers' => [
                    'User-Agent' => 'Mozilla/5.0',
                ],
            ]);

            $data = $response->json();

            if (is_array($data) && count($data) > 0) {
                return $data[0];
            }

            return null;
        } catch (Exception $e) {
            // Tangani kesalahan jika ada
            return null;
        }
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
        // Validate the input data
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'JamBuka' => 'nullable|string',
            'Deskripsi' => 'nullable|string',
            'MenuKuliner' => 'nullable|string',
            'sampul' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Format dan ukuran gambar sampul yang diizinkan
            'gambar' => 'nullable|array',
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Format dan ukuran gambar yang diizinkan
        ]);

        // Find the destination by ID
        $destination = DestinasiKuliner::find($id);

        // Update the destination data
        $destination->nama = $request->input('nama');
        $destination->alamat = $request->input('alamat');
        $destination->latitude = $request->input('latitude');
        $destination->longitude = $request->input('longitude');
        $destination->JamBuka = $request->input('JamBuka');
        $destination->Deskripsi = $request->input('Deskripsi');
        $destination->MenuKuliner = $request->input('MenuKuliner');

        // Process and update the uploaded images
        if ($request->hasFile('sampul')) {
            // Hapus sampul lama sebelum menyimpan sampul baru (optional)
            if ($destination->sampul) {
                Storage::disk('public')->delete($destination->sampul);
            }

            // Simpan sampul ke dalam penyimpanan (misalnya folder public/images)
            $sampulPath = $request->file('sampul')->store('images', 'public');
            // Simpan path sampul baru di kolom "sampul" pada tabel
            $destination->sampul = $sampulPath;
        }

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama sebelum menyimpan gambar baru (optional)
            if (!empty($destination->gambar)) {
                // Hapus gambar lama dari penyimpanan
                $oldImages = json_decode($destination->gambar, true);
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
            $destination->gambar = json_encode($gambarPaths);
        }

        // Save the updated data
        $destination->save();

        // Redirect to the index page with a success message if everything is fine
        return redirect()
            ->route('destinasi-kuliner.index')
            ->with('success', 'Destinasi Kuliner berhasil diupdate.');
    }
}

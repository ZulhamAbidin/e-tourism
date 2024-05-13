<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\DestinasiWisata;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

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
                'HargaTiket' => 'nullable|string|max:255',
                'FasilitasDestinasi' => 'nullable|string|max:255',
                'JamBuka' => 'nullable|string|max:255',
                'Deskripsi' => 'nullable|string',
                'Sejarah' => 'nullable|string',
                'latitude' => 'required|numeric',
                'longitude' => 'required|numeric',
                'sampul' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20048', // Format dan ukuran gambar sampul yang diizinkan
                'gambar' => 'nullable|array',
                'gambar.*' => 'image|mimes:jpeg,png,jpg,gif|max:20048', // Format dan ukuran gambar yang diizinkan
            ],
            [
                'nama.required' => 'Pastikan Anda mengisi nama destinasi.',
                'alamat.required' => 'Pastikan Anda mengisi alamat destinasi.',
                'latitude.required' => 'Pastikan Anda Memilih Lokasi Destinasi.',
                'longitude.required' => 'Pastikan Anda Memilih Lokasi Destinasi.',
                'gambar.0.image' => 'Pastikan Anda Memilih gambar yang sesuai dengan format dan size yang telah ditentukan.',
                'gambar.0.mimes' => 'Pastikan Anda Memilih gambar dengan format: jpeg, png, jpg, gif.',
            ],
        );
        // Ambil data dari form
        $nama = $request->input('nama');
        $alamat = $request->input('alamat');
        $hargaTiket = $request->input('HargaTiket');
        $fasilitasDestinasi = $request->input('FasilitasDestinasi');
        $jamBuka = $request->input('JamBuka');
        $deskripsi = $request->input('Deskripsi');
        $sejarah = $request->input('Sejarah');
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        // Simpan data ke dalam database
        $destinasiWisata = new DestinasiWisata([
            'nama' => $nama,
            'alamat' => $alamat,
            'HargaTiket' => $hargaTiket,
            'FasilitasDestinasi' => $fasilitasDestinasi,
            'JamBuka' => $jamBuka,
            'Deskripsi' => $deskripsi,
            'Sejarah' => $sejarah,
            'latitude' => $latitude,
            'longitude' => $longitude,
        ]);

        // Upload dan simpan gambar sampul
        if ($request->hasFile('sampul')) {
            // Simpan gambar sampul ke dalam folder penyimpanan (misalnya folder public/images)
            $sampulPath = $request->file('sampul')->store('images', 'public');

            // Simpan path gambar sampul di kolom "sampul" pada tabel
            $destinasiWisata->sampul = $sampulPath;
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
            $destinasiWisata->gambar = json_encode($gambarPaths);
        }

        if ($destinasiWisata->save()) {
            // Tampilkan SweetAlert berhasil
            return redirect()
                ->route('destinasi-wisata.index')
                ->with('success', 'Destinasi wisata berhasil ditambahkan.');
        } else {
            // Tampilkan SweetAlert gagal
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

        // Check if there is a search query
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('nama', 'LIKE', '%' . $search . '%')->orWhere('alamat', 'LIKE', '%' . $search . '%');
            // Add other fields if you want to search on them as well
        }

        $destinasiWisataList = $query->get();

        return view('destinasi_wisata.index', ['destinasiWisataList' => $destinasiWisataList]);
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
        // Validate the input data
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'HargaTiket' => 'nullable|numeric',
            'FasilitasDestinasi' => 'nullable|string',
            'JamBuka' => 'nullable|string',
            'Deskripsi' => 'nullable|string',
            'Sejarah' => 'nullable|string',
            'sampul' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Format dan ukuran gambar sampul yang diizinkan
            'gambar' => 'nullable|array',
            'gambar.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Format dan ukuran gambar yang diizinkan
        ]);

        // Find the destination by ID
        $destination = DestinasiWisata::find($id);

        // Update the destination data
        $destination->nama = $request->input('nama');
        $destination->alamat = $request->input('alamat');
        $destination->latitude = $request->input('latitude');
        $destination->longitude = $request->input('longitude');
        $destination->HargaTiket = $request->input('HargaTiket');
        $destination->FasilitasDestinasi = $request->input('FasilitasDestinasi');
        $destination->JamBuka = $request->input('JamBuka');
        $destination->Deskripsi = $request->input('Deskripsi');
        $destination->Sejarah = $request->input('Sejarah');

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
            ->route('destinasi-wisata.index')
            ->with('success', 'Destinasi Wisata berhasil diupdate.');
    }
}

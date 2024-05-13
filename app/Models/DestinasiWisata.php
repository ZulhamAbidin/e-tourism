<?php

namespace App\Models;

use App\Models\Komentar;
use Illuminate\Database\Eloquent\Model;

class DestinasiWisata extends Model
{
    protected $table = 'destinasi_wisata'; // Nama tabel yang sesuai dengan tabel di database

    protected $fillable = [
        'nama',
        'alamat',
        'HargaTiket',
        'FasilitasDestinasi',
        'JamBuka',
        'Deskripsi',
        'Sejarah',
        'latitude',
        'longitude',
        'sampul', // Ubah "image_path" menjadi "sampul" untuk sesuai dengan skema database
        'gambar', // Tambahkan kolom "gambar" untuk sesuai dengan skema database
    ];

    public function komentars()
    {
        return $this->hasMany(Komentar::class, 'destinasi_wisata_id');
    }
    
    

    public function totalRating()
    {
        // Menghitung total rating dari komentar-komentar pada postingan destinasi
        return $this->komentars()->sum('rating');
    }

    public function averageRating()
    {
        // Menghitung rata-rata rating dari komentar-komentar pada postingan destinasi
        $totalRating = $this->totalRating();
        $totalKomentar = $this->komentars()->count();

        if ($totalKomentar > 0) {
            return $totalRating / $totalKomentar;
        } else {
            return 0;
        }
    }

    public function totalKomentar()
    {
        return $this->komentars()->count();
    }

    public function getTotalRatingAttribute()
    {
        // Ambil total rating dari komentar yang terkait dengan destinasi wisata ini
        return $this->komentars->sum('rating');
    }

    
}

<?php

namespace App\Models;

use App\Models\Komentar;
use Illuminate\Database\Eloquent\Model;

class DestinasiHotel extends Model
{
    // Tentukan nama tabel yang sesuai
    protected $table = 'destinasi_hotel';

    // Tentukan kolom-kolom yang bisa diisi (fillable)
    protected $fillable = [
        'nama',
        'alamat',
        'JamBuka',
        'Deskripsi',
        'latitude',
        'longitude',
        'sampul',
        'gambar',
    ];

    public function komentars()
    {
        return $this->hasMany(Komentar::class, 'destinasi_hotel_id');
    }

    public function totalRating()
    {
        // Menghitung total rating dari komentar-komentar pada postingan destinasi hotel
        return $this->komentars()->sum('rating');
    }

    public function averageRating()
    {
        // Menghitung rata-rata rating dari komentar-komentar pada postingan destinasi hotel
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
        return $this->komentars->sum('rating');
    }
}


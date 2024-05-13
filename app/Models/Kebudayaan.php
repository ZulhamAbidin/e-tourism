<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kebudayaan extends Model
{
    protected $table = 'kebudayaan'; // Nama tabel di database

    protected $fillable = ['nama', 'Deskripsi', 'latitude', 'longitude', 'sampul', 'gambar', 'alamat'];

    public function komentars()
    {
        return $this->hasMany(Komentar::class, 'kebudayaan_id');
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

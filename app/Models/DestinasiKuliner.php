<?php

namespace App\Models;

use App\Models\DestinasiKuliner;
use App\Models\Komentar;
use Illuminate\Database\Eloquent\Model;

class DestinasiKuliner extends Model
{
    protected $table = 'destinasi_kuliner';

    protected $fillable = [
        'nama',
        'alamat',
        'JamBuka',
        'Deskripsi',
        'latitude',
        'longitude',
        'sampul',
        'gambar',
        'MenuKuliner',
    ];

    public function komentars()
    {
        return $this->hasMany(Komentar::class, 'destinasi_kuliner_id');
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
        // Ambil total rating dari komentar yang terkait dengan destinasi kuliner ini
        return $this->komentars->sum('rating');
    }

    // Tambahkan atribut yang ingin Anda gunakan di model, misalnya:
    // protected $primaryKey = 'id';
    // protected $timestamps = true;
    // protected $dateFormat = 'Y-m-d H:i:s';
}

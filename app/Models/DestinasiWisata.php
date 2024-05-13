<?php

namespace App\Models;

use App\Models\Komentar;
use Illuminate\Database\Eloquent\Model;

class DestinasiWisata extends Model
{
    protected $table = 'destinasi_wisata'; 

    protected $fillable = [
        'nama',
        'alamat',
        'keterangan',
        'gambar',
    ];

    public function komentars()
    {
        return $this->hasMany(Komentar::class, 'destinasi_wisata_id');
    }
    
}

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
        'gambar',
    ];

    public function komentars()
    {
        return $this->hasMany(Komentar::class, 'destinasi_kuliner_id');
    }

}

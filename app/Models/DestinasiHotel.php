<?php

namespace App\Models;

use App\Models\Komentar;
use Illuminate\Database\Eloquent\Model;

class DestinasiHotel extends Model
{
    protected $table = 'destinasi_hotel';

    protected $fillable = [
        'nama',
        'alamat',
        'gambar',
    ];
}


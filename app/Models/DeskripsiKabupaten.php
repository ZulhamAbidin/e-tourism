<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeskripsiKabupaten extends Model
{
    protected $table = 'deskripsi_kabupaten';
    
    protected $fillable = ['Deskripsi', 'visi_misi', 'sejarah', 'geografis'];
}

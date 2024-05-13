<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kebudayaan extends Model
{
    protected $table = 'kebudayaan'; 

    protected $fillable = ['nama', 'keterangan', 'gambar'];
    
}

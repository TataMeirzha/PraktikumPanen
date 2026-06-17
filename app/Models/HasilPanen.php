<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HasilPanen extends Model
{
    protected $fillable = [
        'nama_komoditas',
        'jumlah_kg',
        'tanggal_panen',
    ];
}
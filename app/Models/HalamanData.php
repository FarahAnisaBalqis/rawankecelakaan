<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HalamanData extends Model
{
    use HasFactory;
    protected $fillable =[
        'alamat',
        'jumlah_kecelakaan_tunggal',
        'jumlah_kecelakaan_ganda',
        'long',
        'lat',
        'gambar',
    ];

}

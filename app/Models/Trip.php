<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    // Tentukan tabel yang digunakan, jika nama tabel di database tidak mengikuti konvensi plural dari Laravel.
    protected $table = 'trips';

    // Tentukan kolom-kolom yang bisa diisi secara massal
    protected $fillable = [
        'wisata',
        'author',
        'body',
        'link',
        'stok',
        'image',
        'image1',
        'image2',
        'image3'
    ];

    
}

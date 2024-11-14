<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak sesuai dengan konvensi Laravel
    protected $table = 'posts'; // Sesuaikan dengan nama tabel yang Anda gunakan

    // Kolom yang diizinkan untuk diisi secara massal
    protected $fillable = [
        'wisata',
        'author',
        'linkPayment',
        'harga',
        'body',
        'image',
        'image1',
        'image2',
        'image3',
    ];

    
    
}

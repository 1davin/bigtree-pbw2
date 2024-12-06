<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    // Field yang dapat diisi
    protected $fillable = [
        'post_id',           // ID terkait dengan Post
        'trip_id',           // ID terkait dengan Trip (ditambahkan)
        'nama_wisata',       // Nama wisata (umum untuk Post atau Trip)
        'nama',              // Nama pemesan
        'email',             // Email pemesan
        'jumlah_tiket',      // Jumlah tiket dipesan
        'status_pembayaran', // Status pembayaran (pending, success, failed)
        'total_harga',       // Total harga
        'order_id',          // Order ID untuk Midtrans atau payment gateway
    ];

    // Relasi ke model Post (wisata umum)
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // Relasi ke model Trip (wisata tertentu atau paket wisata)
    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
}

<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'nama_wisata',
        'nama',
        'email',
        'jumlah_tiket',
        'status_pembayaran',
        'total_harga',
        'order_id'
    ];
    

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}

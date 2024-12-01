<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\Log;

class PesanController extends Controller
{
    /**
     * Menampilkan form pemesanan berdasarkan ID Post
     */
    public function form($id)
    {
        $post = Post::findOrFail($id); // Mengambil data wisata berdasarkan ID
        return view('form_pemesanan', compact('post'));
    }

    /**
     * Proses pembuatan pemesanan dan mengembalikan Snap Token
     */
    public function submit(Request $request)
    {
        $validatedData = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'jumlah_tiket' => 'required|integer|min:1',
        ]);

        // Ambil data post untuk mendapatkan detail wisata
        $post = Post::findOrFail($validatedData['post_id']);
        

        // Validasi harga
        if (!$post->harga || !is_numeric($post->harga) || $post->harga <= 0) {
            return back()->withErrors(['error' => 'Harga tidak valid untuk post ini.']);
        }

        // Hitung total harga
        $totalPrice = $validatedData['jumlah_tiket'] * (float) $post->harga;

        // Buat order_id unik
        $orderId = 'ORDER-' . $post->id . '-' . time();

        // Simpan data pemesanan ke database
        $pemesanan = Pemesanan::create([
            'post_id' => $validatedData['post_id'],
            'nama' => $validatedData['nama'],
            'email' => $validatedData['email'],
            'jumlah_tiket' => $validatedData['jumlah_tiket'],
            'nama_wisata' => $post->wisata,
            'status_pembayaran' => 'unpaid',
            'total_harga' => $totalPrice,
            'order_id' => $orderId,
        ]);

        // Konfigurasi Midtrans
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        // Parameter untuk Snap Token
        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $totalPrice,
            ],
            'customer_details' => [
                'name' => $validatedData['nama'],
                'email' => $validatedData['email'],
            ],
        ];

        // Dapatkan Snap Token dari Midtrans
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return response()->json(['snapToken' => $snapToken]);
    }

    /**
     * Callback dari Midtrans untuk memperbarui status pembayaran
     */
    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        // Log untuk debugging
        Log::info('Callback received:', $request->all());
        Log::info('Hashed Signature:', ['expected' => $hashed, 'received' => $request->signature_key]);

        // Validasi signature key
        if ($hashed == $request->signature_key) {
            // Cari pemesanan berdasarkan order_id
            $pemesanan = Pemesanan::where('order_id', $request->order_id)->first();

            if ($pemesanan) {
                Log::info('Pemesanan ditemukan:', $pemesanan->toArray());

                // Update status pembayaran berdasarkan status transaksi
                if (in_array($request->transaction_status, ['capture', 'settlement'])) {
                    $pemesanan->update(['status_pembayaran' => 'paid']);
                    Log::info('Pemesanan diperbarui menjadi paid');
                } elseif (in_array($request->transaction_status, ['pending'])) {
                    $pemesanan->update(['status_pembayaran' => 'pending']);
                    Log::info('Pemesanan diperbarui menjadi pending');
                } elseif (in_array($request->transaction_status, ['cancel', 'deny', 'expire'])) {
                    $pemesanan->update(['status_pembayaran' => 'failed']);
                    Log::info('Pemesanan diperbarui menjadi failed');
                } else {
                    Log::warning('Status transaksi tidak dikenali:', ['status' => $request->transaction_status]);
                }
            } else {
                Log::warning('Pemesanan tidak ditemukan untuk order_id:', ['order_id' => $request->order_id]);
            }
        } else {
            Log::error('Signature key mismatch!');
        }
    }
}
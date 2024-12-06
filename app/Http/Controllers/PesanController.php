<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Trip;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\Log;

class PesanController extends Controller
{
    /**
     * Menampilkan form pemesanan berdasarkan ID Post atau Trip
     */
    public function form($type, $id)
{
    if ($type === 'trip') {
        $data = Trip::findOrFail($id);
    } elseif ($type === 'post') {
        $data = Post::findOrFail($id);
    } else {
        abort(404, 'Type not recognized.');
    }

    return view('form_pemesanan', compact('data', 'type'));
}

    


    /**
     * Proses pembuatan pemesanan dan mengembalikan Snap Token
     */
    public function submit(Request $request)
    {
        $validatedData = $request->validate([
            'type' => 'required|in:post,trip',
            'id' => 'required|integer',
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'jumlah_tiket' => 'required|integer|min:1',
        ]);
    
        // Log data yang diterima untuk debugging
        \Log::info('Data yang diterima:', $request->all());
    
        // Ambil data berdasarkan tipe
        if ($validatedData['type'] === 'trip') {
            $data = Trip::findOrFail($validatedData['id']);
    
            // Periksa stok tersedia
            if ($validatedData['jumlah_tiket'] > $data->stok) {
                return response()->json(['error' => 'Jumlah tiket melebihi stok tersedia.'], 422);
            }
        } else {
            $data = Post::findOrFail($validatedData['id']);
        }
    
        // Validasi harga
        if (!$data->harga || !is_numeric($data->harga) || $data->harga <= 0) {
            return back()->withErrors(['error' => 'Harga tidak valid untuk data ini.']);
        }
    
        // Hitung total harga
        $totalPrice = $validatedData['jumlah_tiket'] * (float) $data->harga;
    
        // Buat order_id unik
        $orderId = strtoupper($validatedData['type']) . '-' . $data->id . '-' . time();
    
        // Tentukan trip_id dan post_id berdasarkan type
        $tripId = $validatedData['type'] === 'trip' ? $validatedData['id'] : null;
        $postId = $validatedData['type'] === 'post' ? $validatedData['id'] : null;
    
        // Periksa agar hanya salah satu kolom yang terisi
        if ($tripId === null && $postId === null) {
            return response()->json(['error' => 'Data tidak valid. Tipe pemesanan harus dipilih dengan benar.'], 400);
        }
    
        // Simpan data pemesanan ke database
        $pemesanan = Pemesanan::create([
            'trip_id' => $tripId,
            'post_id' => $postId,
            'nama' => $validatedData['nama'],
            'email' => $validatedData['email'],
            'jumlah_tiket' => $validatedData['jumlah_tiket'],
            'nama_wisata' => $data->wisata,
            'status_pembayaran' => 'unpaid',
            'total_harga' => $totalPrice,
            'order_id' => $orderId,
        ]);
    
        // Kurangi stok jika type adalah trip
        if ($tripId) {
            $data->stok -= $validatedData['jumlah_tiket'];
            $data->save();
        }
    
        // Konfigurasi Midtrans dan proses pembayaran
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
    

    
    public function showFormPemesanan($id, $type)
{
    if ($type === 'post') {
        $data = Post::findOrFail($id);
    } elseif ($type === 'trip') {
        $data = Trip::findOrFail($id);
    } else {
        abort(404, 'Type tidak valid');
    }

    return view('form_pemesanan', compact('data', 'type'));
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

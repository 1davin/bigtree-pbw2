<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;
use Illuminate\Support\Facades\Log;

class TripController extends Controller
{
    /**
     * Menampilkan form pemesanan berdasarkan ID Trip
     */
    public function form($id)
    {
        $trip = Trip::findOrFail($id); // Mengambil data trip berdasarkan ID
        return view('form_pemesanan_trip', compact('trip'));
    }

    /**
     * Proses pembuatan pemesanan untuk Trip
     */
    public function submit(Request $request)
    {
        $validatedData = $request->validate([
            'trip_id' => 'required|exists:trips,id',
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'jumlah_tiket' => 'required|integer|min:1',
        ]);
 
        // Ambil data trip untuk mendapatkan detail wisata
        $trip = Trip::findOrFail($validatedData['trip_id']);

        // Validasi stok tiket
        if ($trip->stok < $validatedData['jumlah_tiket']) {
            return back()->withErrors(['error' => 'Stok tiket tidak mencukupi.']);
        }

        // Hitung total harga
        $totalPrice = $validatedData['jumlah_tiket'] * (float) $trip->harga;

        // Buat order_id unik
        $orderId = 'TRIP-' . $trip->id . '-' . time();

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
}

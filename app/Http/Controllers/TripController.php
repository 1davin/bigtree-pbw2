<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;

class TripController extends Controller
{
    // Menampilkan detail trip
    public function show($id)
    {
        $trip = Trip::findOrFail($id);

        // Konversi data gambar biner ke base64
        if ($trip->image) {
            $trip->image = 'data:image/jpeg;base64,' . base64_encode($trip->image);
        }
        if ($trip->image1) {
            $trip->image1 = 'data:image/jpeg;base64,' . base64_encode($trip->image1);
        }
        if ($trip->image2) {
            $trip->image2 = 'data:image/jpeg;base64,' . base64_encode($trip->image2);
        }
        if ($trip->image3) {
            $trip->image3 = 'data:image/jpeg;base64,' . base64_encode($trip->image3);
        }

        return view('isiTrip', ['title' => 'Detail Trip', 'trip' => $trip]);
    }

    // Menampilkan daftar trip
    public function index(Request $request)
    {
        $trips = Trip::latest();

        // Pencarian berdasarkan nama wisata
        if ($request->has('search')) {
            $trips->where('wisata', 'like', '%' . $request->search . '%');
        }

        $trips = $trips->paginate(6); // Menampilkan 6 item per halaman

        // Konversi data gambar biner ke base64
        foreach ($trips as $trip) {
            if ($trip->image) {
                $trip->image = 'data:image/jpeg;base64,' . base64_encode($trip->image);
            }
            if ($trip->image1) {
                $trip->image1 = 'data:image/jpeg;base64,' . base64_encode($trip->image1);
            }
            if ($trip->image2) {
                $trip->image2 = 'data:image/jpeg;base64,' . base64_encode($trip->image2);
            }
            if ($trip->image3) {
                $trip->image3 = 'data:image/jpeg;base64,' . base64_encode($trip->image3);
            }
        }

          // Tentukan apakah ini untuk tampilan admin atau beranda
          $viewName = request()->route()->named('admin.index') ? 'admin' : 'trip';

          return view($viewName, [
              'trips' => $trips,
              'title' => $viewName == 'admin' ? 'Admin Dashboard' : 'Trips'
          ]);
    }

    // Menampilkan form tambah trip
    public function create()
    {
        return view('tripCreate');
    }

    // Menyimpan data trip baru
    public function store(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'wisata' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'body' => 'required|string',
            'link' => 'required|string|max:255',
            'stok' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:16384',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:16384',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:16384',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:16384'
        ]);

        // Simpan data ke dalam database
        $trip = new Trip();
        $trip->wisata = $validatedData['wisata'];
        $trip->author = $validatedData['author'];
        $trip->body = $validatedData['body'];
        $trip->link = $validatedData['link'];
        $trip->stok = $validatedData['stok'];

        // Jika ada gambar, simpan sebagai biner ke database
        if ($request->hasFile('image')) {
            $trip->image = file_get_contents($request->file('image')->getRealPath());
        }
        if ($request->hasFile('image1')) {
            $trip->image1 = file_get_contents($request->file('image1')->getRealPath());
        }
        if ($request->hasFile('image2')) {
            $trip->image2 = file_get_contents($request->file('image2')->getRealPath());
        }
        if ($request->hasFile('image3')) {
            $trip->image3 = file_get_contents($request->file('image3')->getRealPath());
        }

        $trip->save();

        // Redirect ke halaman trip.create dengan pesan sukses
        return redirect()->route('trip.create')->with('success', 'Trip berhasil ditambahkan');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;

class TripController extends Controller
{
   
    public function show($id)
    {
        $trip = Trip::findOrFail($id);

      
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

   
    public function index(Request $request)
    {
        $trips = Trip::latest();

 
        if ($request->has('search')) {
            $trips->where('wisata', 'like', '%' . $request->search . '%');
        }

        $trips = $trips->paginate(6); 

        
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

          $viewName = request()->route()->named('admin.index') ? 'admin' : 'trip';

          return view($viewName, [
              'trips' => $trips,
              'title' => $viewName == 'admin' ? 'Admin Dashboard' : 'Trips'
          ]);
    }

    public function create()
    {
        return view('tripCreate');
    }

    // Menyimpan data trip baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'wisata' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'body' => 'required|string',
            'link' => 'required|string|max:255',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:16384',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:16384',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:16384',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:16384'
        ]);
    
        $trip = new Trip();
        $trip->wisata = $validatedData['wisata'];
        $trip->author = $validatedData['author'];
        $trip->body = $validatedData['body'];
        $trip->harga = $validatedData['harga'];
        $trip->link = $validatedData['link'];
        $trip->stok = $validatedData['stok'];
    
        // Menyimpan gambar
        foreach (['image', 'image1', 'image2', 'image3'] as $imageField) {
            if ($request->hasFile($imageField)) {
                $trip->$imageField = file_get_contents($request->file($imageField)->getRealPath());
            }
        }
    
        $trip->save();
    
        // Redirect ke daftar trip setelah menyimpan data
        return redirect()->route('trips.index')->with('success', 'Trip berhasil ditambahkan');
    }
    
    public function editTrip()
    {
        $trips = Trip::paginate(10); // Ambil 10 data per halaman
    
        return view('editTrip', [
            'trips' => $trips,
            'title' => 'Daftar Trip'
        ]);
    }
    


    public function edit($id)
    {
        $trip = Trip::findOrFail($id);

        return view('editt', [
            'trip' => $trip,
        ]);
    }


    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'wisata' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'harga' => 'required|numeric',
        'stok' => 'required|numeric',
        'body' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:16384',
        'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:16384',
        'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:16384',
        'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:16384',
    ]);

    $trip = Trip::findOrFail($id);
    $trip->wisata = $validatedData['wisata'];
    $trip->author = $validatedData['author'];
    $trip->stok = $validatedData['stok'];
    $trip->harga = $validatedData['harga'];
    $trip->body = $validatedData['body'];

    foreach (['image', 'image1', 'image2', 'image3'] as $imageField) {
        if ($request->hasFile($imageField)) {
            $trip->$imageField = file_get_contents($request->file($imageField)->getRealPath());
        }
    }

    $trip->save();

    return redirect()->route('trips.index')->with('success', 'Trip berhasil diperbarui');
}


public function destroy($id)
{
    $trip = Trip::findOrFail($id);
    $trip->delete();

    return redirect()->route('trips.index')->with('success', 'Data berhasil dihapus');
}

}

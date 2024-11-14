<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Trip;

class AdminController extends Controller
{
    public function index()
    {
        // Paginasi data Post dan Trip
        $posts = Post::paginate(4);  // Menampilkan 6 postingan per halaman
        $trips = Trip::paginate(4);  // Menampilkan 6 trip per halaman

        // Konversi gambar Post ke base64
        foreach ($posts as $post) {
            if ($post->image) {
                $post->image = 'data:image/jpeg;base64,' . base64_encode($post->image);
            }
            if ($post->image1) {
                $post->image1 = 'data:image/jpeg;base64,' . base64_encode($post->image1);
            }
            if ($post->image2) {
                $post->image2 = 'data:image/jpeg;base64,' . base64_encode($post->image2);
            }
            if ($post->image3) {
                $post->image3 = 'data:image/jpeg;base64,' . base64_encode($post->image3);
            }
        }

        // Konversi gambar Trip ke base64
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

        return view('admin', compact('posts', 'trips'));
    }
}

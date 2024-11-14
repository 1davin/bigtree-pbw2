<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Menampilkan data postingan di halaman beranda tanpa opsi edit dan delete
    public function index(Request $request)
    {
        $beranda = Post::latest();

        if ($request->has('search')) {
            $beranda->where('wisata', 'like', '%' . $request->search . '%');
        }

        $beranda = $beranda->paginate(6);

        foreach ($beranda as $post) {
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

        return view('beranda', [
            'beranda' => $beranda,
            'title' => 'Blog'
        ]);
    }

    // Menampilkan daftar postingan di halaman editPost dengan fitur edit dan delete
    public function editPost()
    {
        $posts = Post::latest()->paginate(6);

        return view('editPost', [
            'posts' => $posts,
            'title' => 'Edit Post'
        ]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'wisata' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'linkPayment' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'body' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:16384',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:16384',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:16384',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:16384',
        ]);

        $post = new Post();
        $post->wisata = $validatedData['wisata'];
        $post->author = $validatedData['author'];
        $post->linkPayment = $validatedData['linkPayment'];
        $post->harga = $validatedData['harga'];
        $post->body = $validatedData['body'];

        if ($request->hasFile('image')) {
            $post->image = file_get_contents($request->file('image')->getRealPath());
        }
        if ($request->hasFile('image1')) {
            $post->image1 = file_get_contents($request->file('image1')->getRealPath());
        }
        if ($request->hasFile('image2')) {
            $post->image2 = file_get_contents($request->file('image2')->getRealPath());
        }
        if ($request->hasFile('image3')) {
            $post->image3 = file_get_contents($request->file('image3')->getRealPath());
        }
        
        $post->save();

        return redirect()->route('beranda.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('edit', [
            'post' => $post,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'wisata' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'linkPayment' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'body' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:16384',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:16384',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:16384',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:16384',
        ]);

        $post = Post::findOrFail($id);
        $post->wisata = $validatedData['wisata'];
        $post->author = $validatedData['author'];
        $post->linkPayment = $validatedData['linkPayment'];
        $post->harga = $validatedData['harga'];
        $post->body = $validatedData['body'];

        if ($request->hasFile('image')) {
            $post->image = file_get_contents($request->file('image')->getRealPath());
        }
        if ($request->hasFile('image1')) {
            $post->image1 = file_get_contents($request->file('image1')->getRealPath());
        }
        if ($request->hasFile('image2')) {
            $post->image2 = file_get_contents($request->file('image2')->getRealPath());
        }
        if ($request->hasFile('image3')) {
            $post->image3 = file_get_contents($request->file('image3')->getRealPath());
        }

        $post->save();

        return redirect()->route('editPost')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('editPost')->with('success', 'Data berhasil dihapus');
    }
}

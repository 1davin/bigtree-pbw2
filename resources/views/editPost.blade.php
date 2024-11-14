@vite(['resources/css/app.css', 'resources/js/app.js'])
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<x-panels></x-panels>
@section('content')
<div class="container mt-4">
    <h1>Edit Post</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Wisata</th>
                <th>Author</th>
                <th>Email</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->wisata }}</td>
                    <td>{{ $post->author }}</td>
                    <td>{{ $post->linkPayment }}</td>
                    <td>Rp{{ number_format($post->harga, 0, ',', '.') }}</td>
                    <td>{{ Str::limit($post->body, 20) }}</td>
                    <td>
                        @if ($post->image)
                            <img src="data:image/jpeg;base64,{{ base64_encode($post->image) }}" alt="Image" width="50">
                        @endif
                        
                    </td>
                    <td>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-success btn-sm">Edit</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $posts->links() }}
</div>

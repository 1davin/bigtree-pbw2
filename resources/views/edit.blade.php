@vite(['resources/css/app.css', 'resources/js/app.js'])
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">


<form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="container mt-4 p-4 border rounded">
    @csrf
    @method('PUT')

    <h2 class="mb-4">Edit Post</h2>

    <div class="mb-3">
        <label for="wisata" class="form-label">Wisata:</label>
        <input type="text" name="wisata" value="{{ $post->wisata }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="author" class="form-label">Author:</label>
        <input type="text" name="author" value="{{ $post->author }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="linkPayment" class="form-label">Link Payment:</label>
        <input type="text" name="linkPayment" value="{{ $post->linkPayment }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="harga" class="form-label">Harga:</label>
        <input type="number" name="harga" value="{{ $post->harga }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="body" class="form-label">Body:</label>
        <textarea name="body" class="form-control" rows="4" required>{{ $post->body }}</textarea>
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Image:</label>
        <input type="file" name="image" class="form-control">
    </div>

    <div class="mb-3">
        <label for="image1" class="form-label">Image1:</label>
        <input type="file" name="image1" class="form-control">
    </div>

    <div class="mb-3">
        <label for="image2" class="form-label">Image2:</label>
        <input type="file" name="image2" class="form-control">
    </div>

    <div class="mb-5 ">
        <label for="image3" class="form-label">Image3:</label>
        <input type="file" name="image3" class="form-control">
    </div>
    
        <button type="submit" class="btn btn-secondary">Save changes</button>
        <a href="/editPost">
        <button type="button"  class="btn btn-outline-secondary">Cancel</button>
    </a>
      
</form>

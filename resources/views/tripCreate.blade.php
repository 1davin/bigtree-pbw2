<!-- Tambahkan class custom di form -->
@vite(['resources/css/app.css', 'resources/js/app.js'])
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-cGxF0Uyj7RRFNmEYzC5D7e5h7EsfvqLfQeIX0F2jx2Ihtl7otxGo+b46n55mLBdK" crossorigin="anonymous"></script>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<x-panels></x-panels>

<div class="container mt-5">
    <a href="/create">
        <h2 class="text-center mb-4">>> Tambah Wisata Biasa? <<</h2>
    </a>
    <h2 class="text-center mb-4">Tambah Data Trip</h2>
    
    <form action="{{ route('trip.store') }}" method="POST" enctype="multipart/form-data" class="p-4 border rounded shadow-sm bg-light form-create-custom mx-auto">
        @csrf
        
        <div class="mb-3">
            <label for="wisata" class="form-label">Wisata</label>
            <input type="text" name="wisata" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" name="author" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label for="body" class="form-label">Deskripsi</label>
            <textarea name="body" class="form-control" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="link" class="form-label">Link</label>
            <input type="text" name="link" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" name="stok" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label for="image" class="form-label">Image Utama</label>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>

        <div class="mb-3">
            <label for="image1" class="form-label">Image 1</label>
            <input type="file" name="image1" class="form-control" accept="image/*">
        </div>

        <div class="mb-3">
            <label for="image2" class="form-label">Image 2</label>
            <input type="file" name="image2" class="form-control" accept="image/*">
        </div>

        <div class="mb-3">
            <label for="image3" class="form-label">Image 3</label>
            <input type="file" name="image3" class="form-control" accept="image/*">
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Tambah Trip</button>
        </div>
    </form>
</div>

<!-- CSS untuk mengatur margin dan padding -->
<style>
    .container {
        margin-top: 0; /* Menghapus margin atas */
        padding: 0 15px; /* Mengurangi padding default */
    }
    
    .form-create-custom {
        max-width: 600px;
        background-color: #f9f9f9;
    }

    .form-create-custom .form-label {
        font-weight: 600;
    }

    .form-create-custom input[type="file"] {
        padding: 8px;
    }

    .btn-primary {
        background-color: #0069d9;
        border-color: #0062cc;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }
</style>

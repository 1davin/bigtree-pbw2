<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Wisata</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        .sidebar {
            background-color: #ffffff;
            min-height: 100vh;
        }
        .sidebar .nav-link {
            color: #333;
            font-weight: 500;
        }
        .sidebar .nav-link:hover {
            background-color: #f1f1f1;
            border-radius: 5px;
        }
        .form-label {
            font-weight: 500;
        }
    </style>
</head>

<body>
    <x-panels></x-panels>

            <!-- Content -->
            <div class="col py-4">
                <div class="container">
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Tambah Trip Wisata</h5>
                        </div>
                            <form action="{{ route('trip.store') }}" method="POST" enctype="multipart/form-data" class="p-4 border bg-white shadow-sm">
                            @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="wisata" class="form-label">Wisata</label>
                                        <input type="text" name="wisata" class="form-control" placeholder="Nama wisata" required>
                                    </div>
                                <div class="col-md-6">
                                    <label for="author" class="form-label">Author</label>
                                    <input type="text" name="author" class="form-control" placeholder="Nama penulis" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="body" class="form-label">Deskripsi</label>
                                    <textarea name="body" class="form-control" rows="4" placeholder="Tuliskan deskripsi wisata" required></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label for="link" class="form-label">Link</label>
                                    <input type="text" name="link" class="form-control" placeholder="URL terkait" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="harga" class="form-label">Harga</label>
                                    <input type="number" name="harga" class="form-control" placeholder="Harga tiket" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="stok" class="form-label">Stok</label>
                                    <input type="number" name="stok" class="form-control" placeholder="Jumlah tiket" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="image" class="form-label">Gambar Utama</label>
                                    <input type="file" name="image" class="form-control" accept="image/*">
                                </div>
                                <div class="col-md-4">
                                    <label for="image1" class="form-label">Gambar 1</label>
                                    <input type="file" name="image1" class="form-control" accept="image/*">
                                </div>
                                <div class="col-md-4">
                                    <label for="image2" class="form-label">Gambar 2</label>
                                    <input type="file" name="image2" class="form-control" accept="image/*">
                                </div>
                                <div class="col-md-4">
                                    <label for="image3" class="form-label">Gambar 3</label>
                                    <input type="file" name="image3" class="form-control" accept="image/*">
                                </div>
                                </div>
                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary w-100">Tambah Trip</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-C89scLLqNg5le/Q1LW/rgARx4mRVxHcRvFJ3Ka65+n94Ui1XcGkpwuuqIbbkYMw" crossorigin="anonymous"></script>
</body>


</html>

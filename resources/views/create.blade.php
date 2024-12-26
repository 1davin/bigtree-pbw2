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
    <link rel="stylesheet" href="/css/createWisata.css"
</head>
<body>
    <x-panels></x-panels>
        <div class="col py-4">
            <div class="container">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Tambah Data Wisata</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('beranda.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="wisata" class="form-label">Wisata</label>
                                    <input type="text" name="wisata" class="form-control" placeholder="Masukkan nama wisata" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="author" class="form-label">Author</label>
                                    <input type="text" name="author" class="form-control" placeholder="Masukkan nama penulis" required>
                                </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" name="harga" class="form-control" placeholder="Masukkan harga" required>
                        </div>
                                    
                    </div>

                    <div class="mb-3">
                        <label for="body" class="form-label">Deskripsi</label>
                        <textarea name="body" class="form-control" rows="4" placeholder="Masukkan deskripsi wisata" required></textarea>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="image" class="form-label">Gambar Utama</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                        </div>
                    <div class="col-md-3">
                        <label for="image1" class="form-label">Gambar 1</label>
                        <input type="file" name="image1" class="form-control" accept="image/*">
                    </div>
                    <div class="col-md-3">
                        <label for="image2" class="form-label">Gambar 2</label>
                        <input type="file" name="image2" class="form-control" accept="image/*">
                    </div>
                    <div class="col-md-3">
                        <label for="image3" class="form-label">Gambar 3</label>
                        <input type="file" name="image3" class="form-control" accept="image/*">
                    </div>
                </div>

                                <button type="submit" class="btn btn-primary">Tambah Data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-C89scLLqNg5le/Q1LW/rgARx4mRVxHcRvFJ3Ka65+n94Ui1XcGkpwuuqIbbkYMw" crossorigin="anonymous"></script>
</body>
</html>

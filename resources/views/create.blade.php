@vite(['resources/css/app.css', 'resources/js/app.js'])
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-cGxF0Uyj7RRFNmEYzC5D7e5h7EsfvqLfQeIX0F2jx2Ihtl7otxGo+b46n55mLBdK" crossorigin="anonymous"></script>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<x-panels></x-panels>


<div class="container mt-4">
  <a href="/trip/create">Tambah Trip</a>

  <div class="row">  <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          Tambah Data Wisata
        </div>
        <div class="card-body">
          <form action="{{ route('beranda.store') }}" method="POST" enctype="multipart/form-data">
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
            <label for="harga" class="form-label">harga</label>
            <input type="number" name="harga" class="form-control" required>
        </div>

            <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <textarea name="body" class="form-control" rows="4" required></textarea>
        </div>

            <div class="mb-3">
            <label for="linkPayment" class="form-label">Link Payment</label>
            <input type="text" name="linkPayment" class="form-control" required>
        </div>        

            <div class="mb-3">
              <label for="image" class="form-label">Image</label>
              <input type="file" name="image" class="form-control" accept="image/*">
            </div>

            <div class="mb-3">
              <label for="image1" class="form-label">Image1</label>
              <input type="file" name="image1" class="form-control" accept="image/*">
            </div>

            <div class="mb-3">
              <label for="image2" class="form-label">Image2</label>
              <input type="file" name="image2" class="form-control" accept="image/*">
            </div>

            <div class="mb-3">
              <label for="image3" class="form-label">Image3</label>
              <input type="file" name="image3" class="form-control" accept="image/*">
            </div>
            
            <button type="submit" class="btn btn-primary">Tambah Data</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

           
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap'); 
        .navbar-brand {
            color: white;
        }
        body {
            overflow: hidden;
            font-family:"Poppins" ;

        }
        /* Mengecilkan dan menggeser form ke atas */
        .form-scale {
            transform: scale(0.9) translateY(-7%); /* Sesuaikan nilai translateY sesuai kebutuhan */
            transform-origin: center;
        }
        .btn{
            background-color: #0399ff;
            display: block;
           
            color:white;

        }
    </style>
</head>
<body>

  <nav class="navbar bg-body-tertiary custom-navbar shadow-sm">
    <img src="{{ asset('image/logo_liburin.png') }}" alt="" width="40" height="40">
    <div class="container">
    <a class="navbar-brand" href="#">
    </a>
  </div>
</nav>

<div class="d-flex justify-content-center align-items-center vh-100">
    <form action="/tiket/simpan" method="POST" class="form-scale p-3 bg-light rounded shadow">
        @csrf
        <h1 class="text-center mb-1">Pemesanan Tiket Wisata</h1>



        <label for="nama_penumpang">Nama Penumpang</label>
        <select name="user_id" id="">
            @foreach ( $pesanan as $p )
                <option value="{{$p->id}}">{{$p->name ? $p->name : "User not found"}}</option>
            @endforeach
        </select><br/>

        <!-- Nomor Telepon -->
        <div class="mb-3">
            <label for="nomer_telepon" class="form-label">Nomor Telepon</label>
            <input type="text"  autoComplete="off" name="nomer_telepon" class="form-control">
        </div>

        <!-- Nama Wisata -->
        <div class="mb-3">
            <label for="nama_wisata" class="form-label">Nama Wisata</label>
            <input type="text" name="nama_wisata" class="form-control" autoComplete="off" aria-label="Nama Wisata">
        </div>

        <!-- Jumlah Tiket -->
        <div class="mb-3">
            <label for="jumlah_" class="form-label">Jumlah Tiket</label>
            <input type="number" name="jumlah_" class="form-control"  autoComplete="off" aria-label="Jumlah Tiket">
        </div>

        <!-- Tanggal Masuk -->
        <div class="mb-3">
            <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
            <input type="datetime-local" name="tanggal_masuk" class="form-control"  autoComplete="off" aria-label="Tanggal Masuk">
        </div>

        <!-- Submit Button -->
        <div class="d-grid">
            <button class="btn" type="submit">Submit</button>
        </div>
    </form>
</div>

</body>
</html>

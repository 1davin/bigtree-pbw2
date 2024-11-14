<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
                @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap'); 

        body {
            background-color: #f8f9fa;
            font-family:"Poppins" ;

        }
        h1 {
            margin-top: 20px;
            margin-bottom: 30px;
            text-align: center;
            color: #343a40;
        }
        table {
            margin: 0 auto;
            max-width: 80%;
        }
        th {
            background-color: #343a40;
            color: black;
        }
        .btn {
            margin-top: 20px;
            display: block;
            margin-left: auto;
            margin-right: auto;
            color:white;
            background-color: #0399ff;

        }
    </style>
</head>
<body>
    <div class="container">
        <h1>List Pesanan</h1>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nomer Telepon</th>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Nama Wisata</th>
                    <th>Jumlah Tiket</th>
                    <th>Tanggal Pesan</th>
                    <th>Tanggal Masuk</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $value)
                <tr>
                    <td>{{$value->nomer_telepon}}</td>
                    <td>{{$value->users ? $value->user->name : 'user ra enek'}}</td>
                    <td>{{$value->nama}}</td>
                    <td>{{$value->nama_wisata}}</td>
                    <td>{{$value->jumlah_tiket}}</td>
                    <td>{{$value->tanggal_pesan}}</td>
                    <td>{{$value->tanggal_masuk}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button onclick="window.location.href='/tiket/create'" type="button" class="btn">Tambah Tiket</button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

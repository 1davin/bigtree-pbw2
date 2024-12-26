<!DOCTYPE html>
<html lang="en">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .table th,
        .table td {
            vertical-align: middle;

        }

        .table img {
            border-radius: 5px;
        }

        .table-actions button {
            margin-left: 10px;
            border-radius: 5px;
        }

        .table-actions .btn {
            font-size: 0.875rem;
            padding: 0.375rem 0.75rem;
        }

        .alert {
            margin-bottom: 20px;
        }

        .page-link {
            border-radius: 5px;

        }

        .table-wrapper {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 10px;
        }

        h1 {
            font-size: 2rem;
            font-weight: 600;
        }
    </style>
</head>

<body>


    <x-panels></x-panels>
    @section('content')
        <div class="col py-4">
            <div class="container">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Edit Post</h5>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="table-wrapper">
                        <table class="table table-bordered table-striped ">
                            <thead class="table-primary">
                                <tr>
                                    <div class="text-center">
                                    <th>ID</th>
                                    <th>Wisata</th>
                                    <th>Author</th>
                                    <th>Email</th>
                                    <th>Harga</th>
                                    <th>Deskripsi</th>
                                    <th>Gambar</th>
                                    <th>Action</th>
                                    </div>
                            </thead>
                            </tr>
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
                                                <img src="data:image/jpeg;base64,{{ base64_encode($post->image) }}"
                                                    alt="Image" width="50" class="img-fluid">
                                            @endif
                                        </td>
                                        <td class="table-actions">
                                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-success btn-sm">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </a>
                                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    <i class="bi bi-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $posts->links() }}
                        </div>
                    </div>
                </div>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-C89scLLqNg5le/Q1LW/rgARx4mRVxHcRvFJ3Ka65+n94Ui1XcGkpwuuqIbbkYMw" crossorigin="anonymous"></script>
    </body>

    </html>

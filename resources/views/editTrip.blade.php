<!DOCTYPE html>
<html lang="en">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/editTrip.css" 
    
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <x-panels></x-panels>

            <!-- Main Content -->
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
                            <table class="table table-hover">
                                <thead class="table-primary text-center">
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
                                    @foreach ($trips as $trip)
                                        <tr class="text-center align-middle">
                                            <td>{{ $trip->id }}</td>
                                            <td>{{ $trip->wisata }}</td>
                                            <td>{{ $trip->author }}</td>
                                            <td>{{ $trip->stok }}</td>
                                            <td>Rp{{ number_format($trip->harga, 0, ',', '.') }}</td>
                                            <td>{{ Str::limit($trip->body, 20) }}</td>
                                            <td>
                                                @if ($trip->image)
                                                    <img src="data:image/jpeg;base64,{{ base64_encode($trip->image) }}"
                                                        alt="Image" width="50" class="img-thumbnail">
                                                @else
                                                    <span class="text-muted">No Image</span>
                                                @endif
                                            </td>
                                            <td class="table-actions">
                                                <a href="{{ route('trips.edit', $trip->id) }}"
                                                    class="btn btn-sm btn-success">
                                                    <i class="bi bi-pencil-square"></i> Edit
                                                </a>
                                                <form action="{{ route('trips.destroy', $trip->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"
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
                                {{ $trips->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C89scLLqNg5le/Q1LW/rgARx4mRVxHcRvFJ3Ka65+n94Ui1XcGkpwuuqIbbkYMw" crossorigin="anonymous"></script>
</body>

</html>

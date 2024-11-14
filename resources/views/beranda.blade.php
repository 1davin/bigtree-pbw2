<!DOCTYPE html>
<html lang="en" class="h-full bg-white">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/Beranda.css">
    
    <title>Beranda</title>
    
</head>
<body class="bg-white">
    <x-navbar></x-navbar> 

    <img src="{{ asset('image/3.jpg') }}" alt="Header Image" class="header-image">

    <div class="content-wrapper d-flex justify-content-center py-4 px-4 mx-auto max-w-screen-xl lg:px-0"> 
        <section class="w-100 bg-white dark:bg-gray-900">
            <div class="text-center search-container">
                <form action="{{ route('beranda.index') }}" method="GET" class="d-flex justify-content-center">
                    <div class="input-group search-input-group ">
                        <span class="input-group-text" id="search-addon">
                            <i class="bi bi-search"></i>
                        </span>
                        <input 
                            type="search" 
                            class="form-control form-control-lg rounded-4 shadow-sm" 
                            placeholder="Cari Destinasi Wisata..." 
                            aria-label="Search" 
                            aria-describedby="search-addon"  
                            id="search" 
                            name="search" 
                            value="{{ request('search') }}" 
                            autocomplete="off" 
                        />
                    </div>
                </form>
            </div>

            <div class="grid gap-5 md:grid-cols-2 lg:grid-cols-3 mt-5">
                @if($beranda->isEmpty())
                    <div class="col-span-full text-center text-gray-500">
                        <p>Wisata yang Anda cari tidak dapat ditemukan.</p>
                        <a href="/beranda" class="text-primary fw-semibold">Kembali</a>
                    </div>
                @else
                    @foreach ($beranda as $post) 
                        <main class="d-flex justify-content-evenly">
                            <div class="card mb-3 shadow-lg" style="width: 18rem; height: 20rem; border-radius: 0;">
                                <img src="{{ $post->image }}" alt="{{ $post->wisata }}" class="w-full h-36 object-cover rounded-0">
                                <div class="card-body">
                                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        <a href="/beranda/{{$post->id}}" class="text-black no-underline hover:text-black">{{ $post->wisata }}</a>
                                    </h5>
                                    <p class="card-text text-sm">{{ Str::limit($post->body, 50) }}</p>
                                    <a href="/beranda/{{$post->id}}" class="btn btn-primary w-50 fw-semibold rounded-pill mt-3">Pesan</a>
                                </div>
                            </div>
                        </main>
                    @endforeach
                @endif
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $beranda->links() }}
            </div>
        </section>
    </div>
</body>
</html>

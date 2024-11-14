@vite(['resources/css/app.css', 'resources/js/app.js'])
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-cGxF0Uyj7RRFNmEYzC5D7e5h7EsfvqLfQeIX0F2jx2Ihtl7otxGo+b46n55mLBdK" crossorigin="anonymous">
</script>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<x-panels></x-panels>

<div class="col py-3">
    <h1 class="text-center">Wisata Biasa</h1>

    <div class="row">
        @foreach ($posts as $post)
            <div class="col-md-3 mb-3">
                <div class="card shadow-lg" style="height: 100%; border-radius: 0;">
                    <img src="{{ $post->image }}" alt="{{ $post->wisata }}" class="card-img-top object-cover"
                        style="height: 7rem;">
                    <div class="card-body">
                        <h5 class="mb-1 font-bold tracking-tight text-gray-900 dark:text-white">
                            <a href="/beranda/{{ $post->id }}"
                                class="text-black text-decoration-none hover:text-black">{{ $post->wisata }}</a>
                        </h5>
                        <p class="card-text text-sm">{{ Str::limit($post->body, 50) }}</p>
                        <a href="/beranda/{{ $post->id }}"
                            class="btn btn-primary w-100 fw-semibold rounded-pill mt-3">Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


    <h1 class="text-center mt-5">Open Trip</h1>

    <div class="row">
        @foreach ($trips as $trip)
            <div class="col-md-3 mb-3">
                <div class="card shadow-lg" style="height: 100%; border-radius: 0;">
                    <img src="{{ $trip->image }}" alt="{{ $trip->wisata }}" class="card-img-top object-cover"
                        style="height: 7rem;">
                    <div class="card-body">
                        <h5 class="mb-1 font-bold tracking-tight text-gray-900 dark:text-white">
                            <a href="/beranda/{{ $trip->id }}"
                                class="text-black text-decoration-none hover:text-black">{{ $trip->wisata }}</a>
                        </h5>
                        <p class="card-text text-sm">{{ Str::limit($trip->body, 50) }}</p>
                        <a href="/beranda/{{ $trip->id }}"
                            class="btn btn-primary w-100 fw-semibold rounded-pill mt-3">Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if ($trips->hasMorePages())
        <div class="text-center">
            <a href="{{ $trips->nextPageUrl() }}" class="btn btn-primary w-25 mt-3">Load More</a>
        </div>
    @endif
</div>

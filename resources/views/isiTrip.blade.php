<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Trip</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/isiCard.css">
</head>
<body>
    <div class="container position-relative">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="image-gallery mb-3 ">
                    <img src="{{ $trip->image }}" alt="Gambar Trip Utama" class="img-fluid rounded">
                </div>
                <div class="thumbnail-row d-flex gap-2">
                    <img src="{{ $trip->image1 }}" alt="Gambar Thumbnail 1" class="img-thumbnail" style="border:none; width: 150px; height: 150px;">
                    <img src="{{ $trip->image2 }}" alt="Gambar Thumbnail 2" class="img-thumbnail" style="border:none; width: 150px; height: 150px;">
                    <img src="{{ $trip->image3 }}" alt="Gambar Thumbnail 3" class="img-thumbnail" style="border:none; width: 150px; height: 150px;">
                </div>
                <div class="mt-3">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127252.28456815133!2d96.78712063568051!3d4.6592002525537675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3038ecfa3641eaaf%3A0x988e1a386334e16c!2sKec.%20Kebayakan%2C%20Kabupaten%20Aceh%20Tengah%2C%20Aceh!5e0!3m2!1sid!2sid!4v1730557493033!5m2!1sid!2sid" width="100%" height="130" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="col-md-6">
                <div class="details">
                    <h1>{{ $trip->wisata }}</h1>
                    <div class="location">📍 Rancabali, Bandung</div>
                    <div class="description mt-3">
                        {{ $trip->body }}
                    </div>
                    <div class="rating mt-2">⭐ 4,5 (100)</div>
                </div>
                <div class="price-button-container d-flex flex-column align-items-center mt-3">
                    
                    @if($trip)
                    <input type="hidden" name="trip_id" value="{{ $trip->id }}">
                    <a href="{{ route('pesan.form', ['type' => 'trip', 'id' => $trip->id]) }}" class="button ">Pesan</a>
                    <p> Tiket yang tersedia = <span id="stok">{{ $trip->stok }}</span></p>
                @else
                    <p class="text-danger">Data trip tidak ditemukan.</p>
                @endif
                
                <div class="price">Rp{{ number_format($trip->harga, 0, ',', '.') }}/tiket</div>
                    

                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
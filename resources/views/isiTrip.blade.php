<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Trip</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            padding: 20px;
        }

        .container {
            max-width: 1000px;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .image-gallery img {
            width: 100%;
            border-radius: 8px;
        }

        .thumbnail-row img {
            cursor: pointer;
            border-radius: 8px;
        }

        .details h1 {
            font-size: 28px;
            margin-bottom: 10px;
        }

        .location {
            color: #6c757d;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .description {
            color: #495057;
            line-height: 1.6;
            background-color: #f1f3f5;
            padding: 10px;
            border-radius: 8px;
        }

        .rating {
            color: #ffbc00;
            font-size: 16px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .map {
            display: flex;
            align-items: center;
            gap: 5px;
            background-color: #007bff;
            color: white;
            padding: 10px;
            border-radius: 8px;
            text-align: center;
            font-size: 14px;
            text-decoration: none;
        }

        .price-button-container {
            position: absolute;
            bottom: 20px;
            right: 20px;
        } 

        .price {
            font-size: 18px;
            color: #212529;
            text-align: center;
        }

        .button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            width: 100%;
        }

        .button:disabled {
            background-color: #b0c4de;
            cursor: not-allowed;
        }

        .button:hover:enabled {
            background-color: #0056b3;
        }

        .error-message {
            color: red;
            font-size: 14px;
            display: none;
        }
    </style>
</head>
<body>
    <div class="container position-relative">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="image-gallery mb-3">
                    <img src="{{ $trip->image }}" alt="Gambar Trip Utama" class="img-fluid">
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
                    <p> Tiket yang tersedia = <span id="stok">{{ $trip->stok }}</span></p>
                    <div class="mb-3">
    <label for="jumlahTiket" class="form-label">Masukkan jumlah Tiket</label>
    <div class="input-group">
        <button type="button" class="btn btn-outline-primary" id="minusButton">−</button>
        <input inputmode="numeric" oninput="this.value = this.value.replace(/\D+/g, '')" id="jumlahTiket" class="form-control text-center" min="1" value="1" required>
        <button type="button" class="btn btn-outline-primary" id="plusButton">+</button>
    </div>
    <div class="error-message" id="errorMessage">Maaf, jumlah tiket yang diminta tidak tersedia.</div>
</div>
                    {{-- <button id="pesanButton" class="button mt-2" disabled>PESAN</button> --}}
    <input type="hidden" name="trip_id" value="{{ $trip ? $trip->id : '' }}">
                    <a  id="pesanButton" class="button mt-2" href="{{ route('pesan.trip', ['id' => $trip->id]) }}"disabled>Pesan Sekarang</a>

                    <div class="price">Rp.28.000/Orang</div>
                </div>
            </div>
        </div>
    </div>

    <script>
      document.getElementById('jumlahTiket').addEventListener('input', updateButtonState);

document.getElementById('minusButton').addEventListener('click', function() {
    const jumlahTiketInput = document.getElementById('jumlahTiket');
    jumlahTiketInput.value = Math.max(1, parseInt(jumlahTiketInput.value) - 1);
    updateButtonState();
});

document.getElementById('plusButton').addEventListener('click', function() {
    const jumlahTiketInput = document.getElementById('jumlahTiket');
    jumlahTiketInput.value = parseInt(jumlahTiketInput.value) + 1;
    updateButtonState();
});

function updateButtonState() {
    const jumlahTiket = parseInt(document.getElementById('jumlahTiket').value);
    const stokTersedia = parseInt(document.getElementById('stok').textContent);
    const pesanButton = document.getElementById('pesanButton');
    const errorMessage = document.getElementById('errorMessage');

    if (jumlahTiket > stokTersedia || jumlahTiket <= 0) {
        pesanButton.disabled = true;
        errorMessage.style.display = 'block';
    } else {
        pesanButton.disabled = false;
        errorMessage.style.display = 'none';
    }
}

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

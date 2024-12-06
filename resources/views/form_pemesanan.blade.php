<style>
    body {
    background-color: #f8f9fa;
}

.card {
    max-width: 600px;
    margin: auto;
    background-color: #ffffff;
}

.card h2 {
    font-weight: bold;
    color: #333333;
}

input::placeholder {
    font-size: 14px;
    color: #aaaaaa;
}

.alert-info {
    background-color: #e9f7fd;
    border-color: #bce8f1;
    color: #31708f;
    font-size: 16px;
    font-weight: bold;
}

.btn-primary {
    background-color: #007bff;
    border: none;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.btn-primary:focus {
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


<form action="{{ route('pesan.submit') }}" method="POST" id="order-form" class="card shadow p-4 border-0 rounded">
    @csrf
    <input type="hidden" name="type" value="{{ $type }}"> 
    <input type="hidden" name="id" value="{{ $data->id }}"> 
    
    <h2 class="text-center mb-4">Form Pemesanan</h2>
    
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control form-control-lg" id="nama" name="nama" placeholder="Masukkan nama Anda" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Masukkan email Anda" required>
    </div>
    @if($type === 'trip')
    <div class="alert alert-info text-center">
        Tiket yang tersedia: <strong id="stok">{{ $data->stok }}</strong>
    </div>
    @endif
    <div class="mb-3">
        <label for="jumlah_tiket" class="form-label">Jumlah Tiket</label>
        <input type="number" class="form-control form-control-lg" id="jumlah_tiket" name="jumlah_tiket" placeholder="Masukkan jumlah tiket" required min="1">
    </div>
    <button type="button" id="pay-button" class="btn btn-primary btn-lg w-100 mt-3">Pesan Sekarang</button>
</form>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script type="text/javascript">
document.getElementById('jumlah_tiket').addEventListener('input', function (event) {
    const maxStok = parseInt("{{ $type === 'trip' ? $data->stok : 'Infinity' }}");
    const jumlahTiket = parseInt(event.target.value);

    if (jumlahTiket > maxStok) {
        alert('Jumlah tiket melebihi stok tersedia!');
        event.target.value = maxStok; 
    }
});

document.getElementById('pay-button').onclick = function (event) {
    event.preventDefault();

    const form = document.getElementById('order-form');
    const formData = new FormData(form);

    fetch('{{ route('pesan.submit') }}', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.snapToken) {
            snap.pay(data.snapToken, {
                onSuccess: function(result){
                    alert("Terimakasih, Pembayaran anda telah sukses :)");
                    window.location.href = "/beranda";
                },
                onPending: function(result){
                    alert("Waiting for your payment!");
                },
                onError: function(result){
                    alert("Payment failed!");
                }
            });
        } else {
            alert("Failed to get Snap Token!");
        }
    })
    .catch(error => {
        console.error("Error:", error);
        alert("Terjadi kesalahan!");
    });
};
</script>

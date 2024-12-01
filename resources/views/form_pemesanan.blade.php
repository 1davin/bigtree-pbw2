<form action="{{ route('pesan.submit') }}" method="POST" id="order-form">
    @csrf
    <input type="hidden" name="post_id" value="{{ $post->id }}">
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
        <label for="jumlah_tiket" class="form-label">Jumlah Tiket</label>
        <input type="number" class="form-control" id="jumlah_tiket" name="jumlah_tiket" required min="1">
    </div>
    <button type="button" id="pay-button" class="btn btn-primary">Pesan</button>
</form>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script type="text/javascript">
    document.getElementById('pay-button').onclick = function (event) {
        event.preventDefault(); // Mencegah submit form langsung
        
        // Ambil data dari form
        const form = document.getElementById('order-form');
        const formData = new FormData(form);

        // Kirim form ke server menggunakan fetch untuk mendapatkan Snap Token
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
                // Buka Snap jika token berhasil didapatkan
                snap.pay(data.snapToken, {
                    onSuccess: function(result){
                        alert("Payment Success!");
                        window.location.href = "/beranda"; // Redirect setelah sukses
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
            alert("Something went wrong!");
        });
    };
</script>

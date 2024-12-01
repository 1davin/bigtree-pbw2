<form action="{{ route('pesan.submit') }}" method="POST">
    @csrf
    <!-- Form untuk Trip -->
    <input type="hidden" name="trip_id" value="{{ $trip ? $trip->id : '' }}">
    <!-- Form lainnya -->
    <input type="text" name="nama" required>
    <input type="email" name="email" required>
    <input type="number" name="jumlah_tiket" required>
    <button type="submit">Pesan</button>
</form>

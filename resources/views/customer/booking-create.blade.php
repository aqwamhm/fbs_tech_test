<x-layout>
    <div class="card shadow-sm border-0 m-5">
        <div class="card-body p-4">
            <h1 class="mb-5 text-center">Booking</h1>
            <form action="/bookings" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="seat_number" class="form-label">Rute</label>
                    <input type="text" value="Jakarta-bandung" class="form-control" disabled>
                </div>

                <div class="mb-3">
                    <label for="seat_number" class="form-label">Keberangkatan</label>
                    <input type="text" value="2 November 2025 14:00" class="form-control" disabled>
                </div>

                <div class="mb-3">
                    <label for="seat_number" class="form-label">Nomor Kursi</label>
                    <select name="seat_number" class="form-control">
                        <option value="">Pilih Nomor Kursi</option>
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                        <option value="">4</option>
                        <option value="">5</option>
                        <option value="">6</option>
                        <option value="">7</option>
                        <option value="">8</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="payment_proof" class="form-label">Bukti Pembayaran (Opsional)</label>
                    <input type="file" class="form-control" id="payment_proof" name="payment_proof" accept="image/*">
                </div>

                <button type="submit" class="btn btn-primary">Simpan Booking</button>
            </form>
        </div>
    </div>
</x-layout>

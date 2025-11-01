<x-layout>
    <div class="container py-4">
        <h4 class="fw-bold mb-3">Konfirmasi Booking</h4>

        <div class="card shadow-sm border-0">
            <div class="card-body">
                <p><strong>Kode Booking:</strong> BK001</p>
                <p><strong>Nama User:</strong> Aqwam Hizbal</p>
                <p><strong>Jadwal:</strong> Jakarta - Surabaya (02 Nov 2025, 10:00)</p>
                <p><strong>Nomor Kursi:</strong> 12A</p>
                <p><strong>Status Saat Ini:</strong> <span class="badge bg-warning text-dark">Pending</span></p>

                <div class="mb-3">
                    <p><strong>Bukti Pembayaran:</strong></p>
                    <img src="https://via.placeholder.com/300x200.png?text=Bukti+Pembayaran" class="img-fluid rounded"
                        style="max-width:300px;">
                </div>

                <form class="mt-3">
                    <div class="mb-3">
                        <label for="status" class="form-label fw-bold">Ubah Status</label>
                        <select id="status" class="form-select" required>
                            <option value="pending" selected>Pending</option>
                            <option value="confirmed">Confirmed</option>
                            <option value="rejected">Rejected</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="" class="btn btn-outline-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</x-layout>

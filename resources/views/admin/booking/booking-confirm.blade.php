<x-layout>
    <div class="container py-4">
        <div class="card">
            <div class="card-body">
                <h1 class="mb-5 text-center">Konfirmasi Booking</h1>
                @if (isset($booking))
                    <p><strong>Kode Booking:</strong> {{ $booking->booking_code }}</p>
                    <p><strong>Nama User:</strong> {{ $booking->user->name }}</p>
                    <p><strong>Email:</strong> {{ $booking->user->email }}</p>
                    <p><strong>Jadwal:</strong> {{ $booking->schedule->route }}
                        ({{ $booking->schedule->departure_date->format('d M Y') }},
                        {{ $booking->schedule->departure_time }})
                    </p>
                    <p><strong>Nomor Kursi:</strong> {{ $booking->seat_number }}</p>
                    <p><strong>Status Saat Ini:</strong> <span
                            class="badge bg-warning text-dark">{{ ucfirst($booking->status) }}</span></p>

                    <div class="mb-3">
                        <p><strong>Bukti Pembayaran:</strong></p>
                        @if ($booking->payment_proof)
                            <img src="{{ asset('storage/' . $booking->payment_proof) }}" class="img-fluid rounded"
                                style="max-width:300px;" alt="Payment Proof">
                        @else
                            <p class="text-muted">Tidak ada bukti pembayaran</p>
                        @endif
                    </div>

                    <form method="POST" action="{{ route('admin.bookings.updateStatus', $booking->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="status" class="form-label fw-bold">Ubah Status</label>
                            <select name="status" id="status" class="form-select" required>
                                <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>
                                    Pending</option>
                                <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>
                                    Confirmed</option>
                                <option value="rejected" {{ $booking->status == 'rejected' ? 'selected' : '' }}>
                                    Rejected</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="{{ route('admin.bookings.index') }}" class="btn btn-outline-secondary">Kembali</a>
                    </form>
                @else
                    <div class="alert alert-info">Booking tidak ditemukan</div>
                @endif
            </div>
        </div>
    </div>
</x-layout>

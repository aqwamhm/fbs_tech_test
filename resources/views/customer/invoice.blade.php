<x-layout>
    <div class="card mt-5">
        <div class="card-body p-4">
            <div class="text-center mb-4">
                <h4 class="fw-bold mb-1">INVOICE BOOKING</h4>
                <small class="text-muted">Kode: {{ $booking->booking_code }}</small>
            </div>

            <div class="mb-3">
                <h6 class="fw-bold border-bottom pb-2">Detail Pemesan</h6>
                <p class="mb-1"><strong>Nama:</strong> {{ $booking->user->name }}</p>
                <p class="mb-0"><strong>Email:</strong> {{ $booking->user->email }}</p>
            </div>

            <div class="mb-3">
                <h6 class="fw-bold border-bottom pb-2">Detail Booking</h6>
                <p class="mb-1"><strong>Jadwal:</strong> {{ $booking->schedule->route }}
                    ({{ $booking->schedule->departure_date->format('d M Y') }},
                    {{ $booking->schedule->departure_time }})</p>
                <p class="mb-1"><strong>Nomor Kursi:</strong> {{ $booking->seat_number }}</p>
                <p class="mb-1"><strong>Status:</strong>
                    @if ($booking->status == 'pending')
                        <span class="text-warning">Pending</span>
                    @elseif($booking->status == 'confirmed')
                        <span class="text-success">Dikonfirmasi</span>
                    @else
                        <span class="text-danger">Ditolak</span>
                    @endif
                </p>
                <p class="mb-0"><strong>Tanggal Booking:</strong> {{ $booking->created_at->format('d M Y') }}</p>
            </div>

            <div class="mb-3">
                <h6 class="fw-bold border-bottom pb-2">Pembayaran</h6>
                <p class="mb-1"><strong>Total:</strong> Rp {{ number_format($booking->schedule->price, 0, ',', '.') }}
                </p>
            </div>

            <button class="btn btn-primary d-block" onclick="window.print()">Print Invoice</button>
        </div>
    </div>
</x-layout>

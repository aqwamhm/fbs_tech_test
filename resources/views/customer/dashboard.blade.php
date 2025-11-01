<x-layout>
    <h1 class="mt-5 mb-3">Jadwal Tersedia:</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Rute</th>
                <th scope="col">Keberangkatan</th>
                <th scope="col">Kursi Tersedia</th>
                <th scope="col">Harga</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($schedules as $schedule)
                <tr>
                    <td>{{ $schedule->route }}</td>
                    <td>{{ $schedule->departure_date->format('d M Y') }} {{ $schedule->departure_time }}</td>
                    <td>{{ $schedule->total_seats - $schedule->bookings->count() }}/{{ $schedule->total_seats }}</td>
                    <td>Rp {{ number_format($schedule->price, 0, ',', '.') }}</td>
                    <td><a href="{{ route('customer.booking.create', ['schedule' => $schedule->id]) }}"
                            class="btn btn-primary">Pesan</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak ada jadwal tersedia</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <h1 class="mt-5 mb-3">Pesanan Saya:</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Kode Booking</th>
                <th scope="col">Rute</th>
                <th scope="col">Keberangkatan</th>
                <th scope="col">Nomor Kursi</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($bookings as $booking)
                <tr>
                    <td>{{ $booking->booking_code }}</td>
                    <td>{{ $booking->schedule->route }}</td>
                    <td>{{ $booking->schedule->departure_date->format('d M Y') }}
                        {{ $booking->schedule->departure_time }}</td>
                    <td>{{ $booking->seat_number }}</td>
                    <td>
                        @if ($booking->status == 'pending')
                            <span class="text-warning">Pending</span>
                        @elseif($booking->status == 'confirmed')
                            <span class="text-success">Dikonfirmasi</span>
                        @else
                            <span class="text-danger">Ditolak</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('customer.invoice', $booking->id) }}" class="btn btn-primary">Lihat
                            invoice</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada pesanan ditemukan</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $bookings->links() }}
    </div>
</x-layout>

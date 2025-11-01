<x-layout>
    <div class="py-5">
        <h1 class="text-center mb-5">Manajemen Booking</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kode</th>
                    <th>User</th>
                    <th>Jadwal</th>
                    <th>Kursi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bookings as $booking)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $booking->booking_code }}</td>
                        <td>{{ $booking->user->name }}</td>
                        <td>{{ $booking->schedule->route }}</td>
                        <td>{{ $booking->seat_number }}</td>
                        <td>
                            @if ($booking->status == 'pending')
                                <span class="badge bg-warning text-dark">Pending</span>
                            @elseif($booking->status == 'confirmed')
                                <span class="badge bg-success">Confirmed</span>
                            @else
                                <span class="badge bg-danger">Rejected</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.booking.confirm', $booking->id) }}"
                                class="btn btn-sm btn-outline-primary">Detail</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No bookings found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layout>

<x-layout>
    <div class="mt-5 mb-5 d-flex justify-content-between align-items-center">
        <h1>Surat Jalan</h1>
        <div>
            <a href="{{ route('admin.schedules.index') }}" class="btn btn-secondary">Kembali</a>
            @if (!$schedule->hasTravelPermit())
                <form action="{{ route('admin.schedules.travel-permit.issue', $schedule->id) }}" method="POST"
                    class="d-inline"
                    onsubmit="return confirm('Apakah Anda yakin ingin membuat surat jalan untuk jadwal ini? Setelah dibuat, pelanggan tidak dapat melakukan pemesanan lagi.')">
                    @csrf
                    <button type="submit" class="btn btn-primary">Buat Surat Jalan</button>
                </form>
            @else
                <button onclick="window.print()" class="btn btn-success">Cetak</button>
            @endif
        </div>
    </div>

    <div id="printable-area">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Informasi Jadwal</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Rute:</strong> {{ $schedule->route }}</p>
                        <p><strong>Tanggal Keberangkatan:</strong>
                            {{ \Carbon\Carbon::parse($schedule->departure_date->toDateString() . ' ' . $schedule->departure_time)->format('j F Y H:i') }}
                        </p>
                        <p><strong>Nama Pengemudi:</strong> {{ $schedule->driver_name ?? '-' }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Nomor Kendaraan:</strong> {{ $schedule->vehicle_number ?? '-' }}</p>
                        <p><strong>Total Kursi:</strong> {{ $schedule->total_seats }}</p>
                        <p><strong>Status Surat Jalan:</strong>
                            @if ($schedule->hasTravelPermit())
                                <span class="badge bg-success">Sudah Dibuat</span>
                                <br><small>{{ \Carbon\Carbon::parse($schedule->travel_permit_issued_at)->setTimezone('Asia/Jakarta')->format('j F Y H:i') }}
                                    WIB</small>
                            @else
                                <span class="badge bg-warning">Belum Dibuat</span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <h5 class="mb-0">Daftar Penumpang</h5>
            </div>
            <div class="card-body">
                @if ($schedule->bookings->count() > 0)
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Penumpang</th>
                                <th>Nomor Kursi</th>
                                <th>Kode Pemesanan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($schedule->bookings as $index => $booking)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $booking->user->name }}</td>
                                    <td>{{ $booking->seat_number }}</td>
                                    <td>{{ $booking->booking_code }}</td>
                                    <td>
                                        @switch($booking->status)
                                            @case('confirmed')
                                                <span class="badge bg-success">Dikonfirmasi</span>
                                            @break

                                            @case('pending')
                                                <span class="badge bg-warning">Menunggu Konfirmasi</span>
                                            @break

                                            @case('cancelled')
                                                <span class="badge bg-danger">Dibatalkan</span>
                                            @break

                                            @default
                                                <span class="badge bg-secondary">{{ $booking->status }}</span>
                                        @endswitch
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-muted">Belum ada penumpang yang terdaftar untuk jadwal ini.</p>
                @endif
            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger mt-3">
            {{ session('error') }}
        </div>
    @endif
</x-layout>

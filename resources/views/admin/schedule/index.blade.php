<x-layout>
    <div class="mt-5 mb-5 d-flex justify-content-between align-items-center">
        <h1>Jadwal</h1>
        <a href="{{ route('admin.schedules.create') }}" class="btn btn-primary">Tambah Jadwal</a>
    </div>
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
            @foreach ($schedules as $schedule)
                <tr>
                    <td>{{ $schedule->route }}</td>
                    <td>{{ \Carbon\Carbon::parse($schedule->departure_date->toDateString() . ' ' . $schedule->departure_time)->format('j M Y H:i') }}
                    </td>
                    <td>
                        @php
                            $bookedSeats = $schedule->bookings->count();
                            $availableSeats = $schedule->total_seats - $bookedSeats;
                        @endphp
                        {{ $availableSeats }}/{{ $schedule->total_seats }}
                    </td>
                    <td>Rp {{ number_format($schedule->price, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('admin.schedules.edit', $schedule->id) }}"
                            class="btn btn-outline-primary btn-sm">Edit</a>
                        <form action="{{ route('admin.schedules.destroy', $schedule->id) }}" method="POST"
                            class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
</x-layout>

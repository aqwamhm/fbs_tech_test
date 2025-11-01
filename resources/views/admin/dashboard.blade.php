<x-layout>
    <div class="container mt-5">
        <h4 class="text-center mb-4">Dashboard Admin</h4>

        <div class="row mb-4">
            <div class="col-md-3 mb-3">
                <div class="card text-center bg-primary text-white">
                    <div class="card-body">
                        <h5>Total Booking</h5>
                        <h3>{{ $totalBookings }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card text-center bg-warning text-white">
                    <div class="card-body">
                        <h5>Pending Booking</h5>
                        <h3>{{ $pendingBookings }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card text-center bg-success text-white">
                    <div class="card-body">
                        <h5>Confirmed Booking</h5>
                        <h3>{{ $confirmedBookings }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card text-center bg-info text-white">
                    <div class="card-body">
                        <h5>Total Jadwal</h5>
                        <h3>{{ $totalSchedules }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mb-4">
            <a href="{{ route('admin.bookings.index') }}" class="btn btn-primary me-2">Manajemen Booking</a>
            <a href="/admin/schedules" class="btn btn-outline-primary">Manajemen Jadwal</a>
        </div>
    </div>
</x-layout>

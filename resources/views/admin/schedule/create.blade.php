<x-layout>
    <div class="container py-4">

        <div class="card">
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Terjadi kesalahan:</strong>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.schedules.store') }}" method="POST">
                    @csrf
                    <h1 class="mb-5 text-center">Tambah Jadwal Baru</h1>

                    <div class="mb-3">
                        <label for="route" class="form-label fw-bold">Rute</label>
                        <input type="text" id="route" name="route"
                            class="form-control @error('route') is-invalid @enderror"
                            placeholder="Contoh: Jakarta - Surabaya" value="{{ old('route') }}" required>
                        @error('route')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="departure_date" class="form-label fw-bold">Tanggal Keberangkatan</label>
                            <input type="date" id="departure_date" name="departure_date"
                                class="form-control @error('departure_date') is-invalid @enderror"
                                value="{{ old('departure_date') }}" required>
                            @error('departure_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="departure_time" class="form-label fw-bold">Waktu Keberangkatan</label>
                            <input type="time" id="departure_time" name="departure_time"
                                class="form-control @error('departure_time') is-invalid @enderror"
                                value="{{ old('departure_time') }}" required>
                            @error('departure_time')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="total_seats" class="form-label fw-bold">Total Kursi</label>
                        <input type="number" id="total_seats" name="total_seats"
                            class="form-control @error('total_seats') is-invalid @enderror"
                            value="{{ old('total_seats', 12) }}" min="1" required>
                        @error('total_seats')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label fw-bold">Harga Tiket (Rp)</label>
                        <input type="number" id="price" name="price"
                            class="form-control @error('price') is-invalid @enderror" placeholder="250000"
                            step="0.01" value="{{ old('price') }}" required>
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="driver_name" class="form-label fw-bold">Nama Supir</label>
                        <input type="text" id="driver_name" name="driver_name"
                            class="form-control @error('driver_name') is-invalid @enderror"
                            placeholder="Contoh: Budi Santoso" value="{{ old('driver_name') }}">
                        @error('driver_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="vehicle_number" class="form-label fw-bold">Nomor Kendaraan</label>
                        <input type="text" id="vehicle_number" name="vehicle_number"
                            class="form-control @error('vehicle_number') is-invalid @enderror"
                            placeholder="Contoh: B 1234 XYZ" value="{{ old('vehicle_number') }}">
                        @error('vehicle_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <a href="{{ route('admin.schedules.index') }}"
                            class="btn btn-outline-secondary me-2">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan Jadwal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>

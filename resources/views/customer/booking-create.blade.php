<x-layout>
    <div class="card shadow-sm border-0 m-5">
        <div class="card-body p-4">
            <h1 class="mb-5 text-center">Booking</h1>
            <form action="{{ route('customer.booking.store', $schedule->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="schedule_info" class="form-label">Jadwal</label>
                    <input type="text" id="schedule_info" class="form-control"
                        value="{{ $schedule->route }} - {{ $schedule->departure_date->format('d M Y') }} {{ $schedule->departure_time }}"
                        disabled>
                </div>

                <div class="mb-3">
                    <label for="seat_number" class="form-label">Nomor Kursi</label>
                    <select name="seat_number" id="seat_number"
                        class="form-control @error('seat_number') is-invalid @enderror" required>
                        <option value="">Pilih Nomor Kursi</option>
                        @foreach ($availableSeats as $seat)
                            <option value="{{ $seat }}">{{ $seat }}</option>
                        @endforeach
                    </select>
                    @error('seat_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="payment_proof" class="form-label">Bukti Pembayaran (Wajib)</label>
                    <input type="file" class="form-control @error('payment_proof') is-invalid @enderror"
                        id="payment_proof" name="payment_proof" accept="image/*" required>
                    @error('payment_proof')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan Booking</button>
            </form>
        </div>
    </div>

</x-layout>

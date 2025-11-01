<x-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center fw-bold mb-4">Register</h4>
                        <form>
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="name" placeholder="Nama Lengkap Anda"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="name@example.com"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Nomor HP</label>
                                <input type="number" class="form-control" id="number" placeholder="089xxxxxxxxx"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="••••••••"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    placeholder="********" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 fw-bold">Daftar</button>
                        </form>
                        <p class="text-center mt-3 mb-0 small">
                            Sudah punya akun? <a href="">Login</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>

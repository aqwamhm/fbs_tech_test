<x-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h4 class="text-center fw-bold mb-4">Login</h4>
                        <form>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="you@example.com"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="••••••••"
                                    required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 fw-bold">Login</button>
                        </form>
                        <p class="text-center mt-3 mb-0 small">
                            Belum punya akun? <a href="">Daftar</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>

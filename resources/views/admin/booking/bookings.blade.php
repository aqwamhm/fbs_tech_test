<x-layout>
    <div class="container py-4">
        <h4 class="fw-bold mb-3">Manajemen Booking</h4>

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
                <tr>
                    <td>1</td>
                    <td>BK001</td>
                    <td>Aqwam Hizbal</td>
                    <td>Jakarta - Surabaya</td>
                    <td>12A</td>
                    <td><span class="badge bg-warning text-dark">Pending</span></td>
                    <td><a href="" class="btn btn-sm btn-outline-primary">Detail</a></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>BK002</td>
                    <td>Rafi Fadhlan</td>
                    <td>Bandung - Bali</td>
                    <td>8B</td>
                    <td><span class="badge bg-success">Confirmed</span></td>
                    <td><a href="" class="btn btn-sm btn-outline-primary">Detail</a></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>BK003</td>
                    <td>Amirul Hakim</td>
                    <td>Surabaya - Medan</td>
                    <td>15C</td>
                    <td><span class="badge bg-danger">Rejected</span></td>
                    <td><a href="" class="btn btn-sm btn-outline-primary">Detail</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</x-layout>

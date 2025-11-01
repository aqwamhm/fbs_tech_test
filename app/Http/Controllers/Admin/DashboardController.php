<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Schedule;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBookings = Booking::count();
        $pendingBookings = Booking::where('status', 'pending')->count();
        $confirmedBookings = Booking::where('status', 'confirmed')->count();
        $totalSchedules = Schedule::count();
        $totalCustomers = User::where('role', 'customer')->count();

        return view('admin.dashboard', compact(
            'totalBookings',
            'pendingBookings',
            'confirmedBookings',
            'totalSchedules',
            'totalCustomers'
        ));
    }
}

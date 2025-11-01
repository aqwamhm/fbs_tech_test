<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $bookings = Booking::where('user_id', $user->id)
            ->with('schedule')
            ->latest()
            ->paginate(10);

        $schedules = Schedule::notDeparted()
            ->orderBy('departure_date')
            ->orderBy('departure_time')
            ->get();

        return view('customer.dashboard', compact('bookings', 'schedules'));
    }
}

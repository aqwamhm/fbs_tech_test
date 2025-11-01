<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Schedule;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['user', 'schedule'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.booking.bookings', compact('bookings'));
    }

    public function confirm($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update([
            'status' => 'confirmed',
            'confirmed_at' => now(),
        ]);

        return redirect()->route('admin.bookings.index')->with('success', 'Booking confirmed successfully!');
    }

    public function showConfirmForm($bookingId)
    {
        $booking = Booking::with(['user', 'schedule'])->findOrFail($bookingId);
        return view('admin.booking.booking-confirm', compact('booking'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,rejected',
        ]);

        $booking = Booking::findOrFail($id);

        $booking->update([
            'status' => $request->status,
            'confirmed_at' => $request->status === 'confirmed' ? now() : null,
        ]);

        return redirect()->route('admin.bookings.index')->with('success', 'Booking status updated successfully!');
    }
}

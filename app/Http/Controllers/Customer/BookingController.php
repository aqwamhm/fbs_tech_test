<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $bookings = Booking::where('user_id', $user->id)
            ->with('schedule')
            ->latest()
            ->paginate(10);

        return view('customer.bookings', compact('bookings'));
    }

    public function create($scheduleId)
    {
        $schedule = Schedule::findOrFail($scheduleId);

        // Check if the schedule has already departed
        if ($schedule->hasDeparted()) {
            return redirect()->route('customer.dashboard')
                ->with('error', 'Cannot book for this schedule as it has already departed.');
        }

        $bookedSeats = $schedule->bookings->pluck('seat_number')->toArray();
        $availableSeats = [];
        for ($i = 1; $i <= $schedule->total_seats; $i++) {
            if (!in_array($i, $bookedSeats)) {
                $availableSeats[] = $i;
            }
        }
        return view('customer.booking-create', compact('schedule', 'availableSeats'));
    }

    public function store(Request $request, $scheduleId)
    {
        $validated = $request->validate([
            'seat_number' => 'required|integer|min:1|max:12',
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Check if the schedule still exists and hasn't departed
        $schedule = Schedule::findOrFail($scheduleId);
        if ($schedule->hasDeparted()) {
            return back()->withErrors(['schedule' => 'Cannot book for this schedule as it has already departed.']);
        }

        // Check if the seat is already booked for this schedule
        $existingBooking = Booking::where('schedule_id', $scheduleId)
            ->where('seat_number', $validated['seat_number'])
            ->first();

        if ($existingBooking) {
            return back()->withErrors(['seat_number' => 'This seat is already booked. Please select another seat.']);
        }

        // Handle payment proof upload
        $paymentProofPath = $request->file('payment_proof')->store('payment_proofs', 'public');

        // Generate unique booking code
        do {
            $bookingCode = strtoupper(Str::random(8));
        } while (Booking::where('booking_code', $bookingCode)->exists());

        $user = Auth::user();

        Booking::create([
            'booking_code' => $bookingCode,
            'user_id' => $user->id,
            'schedule_id' => $scheduleId,
            'seat_number' => $validated['seat_number'],
            'status' => 'pending',
            'payment_proof' => $paymentProofPath,
        ]);

        return redirect()->route('customer.dashboard');
    }

    public function showInvoice($id)
    {
        $user = Auth::user();
        $booking = Booking::where('id', $id)
            ->where('user_id', $user->id)
            ->with('schedule')
            ->firstOrFail();

        return view('customer.invoice', compact('booking'));
    }

    public function getAvailableSeats($scheduleId)
    {
        $schedule = Schedule::findOrFail($scheduleId);
        $bookedSeats = $schedule->bookings->pluck('seat_number')->toArray();
        $availableSeats = [];

        for ($i = 1; $i <= $schedule->total_seats; $i++) {
            if (!in_array($i, $bookedSeats)) {
                $availableSeats[] = $i;
            }
        }

        return response()->json(['availableSeats' => $availableSeats]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::with('bookings')->orderBy('departure_date', 'asc')
            ->orderBy('departure_time', 'asc')
            ->get();
        return view('admin.schedule.index', compact('schedules'));
    }

    public function create()
    {
        return view('admin.schedule.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'route' => 'required|string|max:255',
            'departure_date' => 'required|date',
            'departure_time' => 'required|date_format:H:i',
            'total_seats' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'driver_name' => 'nullable|string|max:255',
            'vehicle_number' => 'nullable|string|max:255',
        ]);

        $schedule = Schedule::create($request->all());

        return redirect()->route('admin.schedules.index')->with('success', 'Schedule created successfully');
    }

    public function edit(Schedule $schedule)
    {
        return view('admin.schedule.edit', compact('schedule'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $request->validate([
            'route' => 'required|string|max:255',
            'departure_date' => 'required|date',
            'departure_time' => 'required|date_format:H:i',
            'total_seats' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'driver_name' => 'nullable|string|max:255',
            'vehicle_number' => 'nullable|string|max:255',
        ]);

        $schedule->update($request->all());

        return redirect()->route('admin.schedules.index')->with('success', 'Schedule updated successfully');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return redirect()->route('admin.schedules.index')->with('success', 'Schedule deleted successfully');
    }

    public function showTravelPermit(Schedule $schedule)
    {
        $schedule->load('bookings.user');
        return view('admin.schedule.travel-permit', compact('schedule'));
    }

    public function issueTravelPermit(Schedule $schedule)
    {
        if ($schedule->hasTravelPermit()) {
            return redirect()->route('admin.schedules.travel-permit.show', $schedule->id)
                ->with('error', 'Travel permit has already been issued for this schedule.');
        }

        $schedule->issueTravelPermit();

        return redirect()->route('admin.schedules.travel-permit.show', $schedule->id)
            ->with('success', 'Travel permit has been issued successfully.');
    }
}

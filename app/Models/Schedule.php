<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schedule extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'route',
        'departure_date',
        'departure_time',
        'total_seats',
        'price',
        'driver_name',
        'vehicle_number',
    ];

    protected $casts = [
        'departure_date' => 'date',
        'price' => 'decimal:2',
    ];

    public function getDepartureTimeAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('H:i');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function hasDeparted()
    {
        $departureDateTime = $this->departure_date->format('Y-m-d') . ' ' . $this->departure_time;
        $nowInJakarta = now()->setTimezone('Asia/Jakarta');
        return $nowInJakarta->greaterThan(\Carbon\Carbon::parse($departureDateTime, 'Asia/Jakarta'));
    }

    public function scopeNotDeparted($query)
    {
        $nowInJakarta = now()->setTimezone('Asia/Jakarta');
        return $query->whereRaw("CONCAT(departure_date, ' ', departure_time) > ?", [$nowInJakarta->format('Y-m-d H:i:s')]);
    }
}

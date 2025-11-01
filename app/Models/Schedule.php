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

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'phone' => '081234567890',
        ]);

        // Checker
        User::create([
            'name' => 'Checker',
            'email' => 'checker@example.com',
            'password' => Hash::make('password'),
            'role' => 'checker',
            'phone' => '081234567891',
        ]);

        // Customer
        User::create([
            'name' => 'John Doe',
            'email' => 'customer@example.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
            'phone' => '081234567892',
        ]);

        // Create sample schedules
        Schedule::create([
            'route' => 'Jakarta - Bandung',
            'departure_date' => now()->addDays(2)->format('Y-m-d'),
            'departure_time' => '14:00',
            'total_seats' => 12,
            'price' => 100000,
            'driver_name' => 'Budi Santoso',
            'vehicle_number' => 'B 1234 CD',
        ]);
    }
}

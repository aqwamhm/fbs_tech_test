<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

// Redirect home to login
Route::get('/', function () {
    return redirect('/login');
});

// Authentication routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Role-based routes with middleware
Route::middleware(['auth'])->group(function () {
    // Customer routes
    Route::middleware(['role:customer'])->group(function () {
        Route::get('/customer/dashboard', function () {
            return view('customer.dashboard');
        })->name('customer.dashboard');

        Route::get('/customer/booking-create', function () {
            return view('customer.booking-create');
        });

        Route::get('/customer/invoice', function () {
            return view('customer.invoice');
        });

        Route::get('/customer/bookings', function () {
            return view('customer.bookings');
        });
    });

    // Admin routes
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        Route::get('/admin/bookings', function () {
            return view('admin.booking.bookings');
        });

        Route::get('/admin/booking/confirm', function () {
            return view('admin.booking.booking-confirm');
        });
    });
});

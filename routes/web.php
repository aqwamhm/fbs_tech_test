<?php

use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Customer\BookingController as CustomerBookingController;
use App\Http\Controllers\Customer\DashboardController as CustomerDashboardController;
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
        Route::get('/customer/dashboard', [CustomerDashboardController::class, 'index'])->name('customer.dashboard');

        Route::get('/customer/booking-create/{schedule}', [CustomerBookingController::class, 'create'])->name('customer.booking.create');
        Route::post('/customer/booking-create/{schedule}', [CustomerBookingController::class, 'store'])->name('customer.booking.store');

        Route::get('/customer/invoice/{id}', [CustomerBookingController::class, 'showInvoice'])->name('customer.invoice');

        Route::get('/customer/bookings', [CustomerBookingController::class, 'index'])->name('customer.bookings');

        Route::get('/api/available-seats/{scheduleId}', [CustomerBookingController::class, 'getAvailableSeats']);
    });

    // Admin routes
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

        Route::get('/admin/bookings', [AdminBookingController::class, 'index'])->name('admin.bookings.index');
        Route::put('/admin/bookings/{id}/status', [AdminBookingController::class, 'updateStatus'])->name('admin.bookings.updateStatus');
        Route::get('/admin/booking/{booking}/confirm', [AdminBookingController::class, 'showConfirmForm'])->name('admin.booking.confirm');
        Route::put('/admin/bookings/{id}/confirm', [AdminBookingController::class, 'confirm'])->name('admin.bookings.confirm.update');
    });

    // Checker routes
    Route::middleware(['role:checker'])->group(function () {
        Route::get('/checker/dashboard', function () {
            return view('checker.dashboard');
        });
    });
});

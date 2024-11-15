<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Landing page
Route::get('/', function () {
    return view('landingpage');
})->name('landingpage');

// Authentication Routes
// Show Login Page
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

// Process Login Request
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Show Register Page
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');

// Process Register Request
Route::post('/register', [AuthController::class, 'register']);

// Logout Route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/bookings', [BookingController::class, 'index'])->name('pemesanan');
    Route::get('/bookings/create', [BookingController::class, 'create'])->name('dashboard');
    Route::post('/bookings', [BookingController::class, 'store'])->name('user.booking.store');
});

// Admin Dashboard Route
Route::middleware('auth')->get('/admin', [AdminController::class, 'index'])->name('admin.index');

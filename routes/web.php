<?php

use App\Http\Controllers\AdminBookingController;
use App\Http\Controllers\BengkelController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Models\Booking;
use Illuminate\Support\Facades\Route;

// Landing page
Route::get('/', function () {
    return view('landingpage');
})->name('landingpage');

Route::get('/lebih-lanjut', [BengkelController::class, 'index'])->name('lebihlanjut');

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
    Route::get('/booking/history', [BookingController::class, 'bookingHistory'])->name('historypemesanan');
    Route::get('/get-services', [BookingController::class, 'getServices'])->name('services.get');
    Route::get('/bookings/print/{id}', [BookingController::class, 'print'])->name('bookings.print');
});

// Admin Dashboard Route
Route::get('/admin/bookings', [AdminBookingController::class, 'index'])->name('admin.bookings');
Route::post('/admin/bookings/update-status', [AdminBookingController::class, 'updateStatus'])->name('bookings.update-status');
Route::get('/admin/bookings/history', [AdminBookingController::class, 'history'])->name('admin.HistoryBooking');
Route::get('/get-services-by-vehicle-type', [BookingController::class, 'getServicesByVehicleType'])->name('services.getByVehicleType');
Route::get('/get-pdf-admin', [AdminBookingController::class, 'exportPDF'])->name('exportPDF.admin');

// Menampilkan daftar layanan servis
Route::get('/services', [ServiceController::class, 'index'])->name('admin.servis');
Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
Route::put('/services/{service}', [ServiceController::class, 'update'])->name('services.update');
Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');

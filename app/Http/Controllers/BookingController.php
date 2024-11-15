<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // Show the booking form
    public function create()
    {
        return view('dashboard');
    }

    // Store the booking data
        public function store(Request $request)
    {
        $validated = $request->validate([
            'vehicle_type' => 'required|string',
            'service_date' => 'required|date',
            'details' => 'nullable|string',
        ]);

        $booking = Booking::create([
            'vehicle_type' => $validated['vehicle_type'],
            'service_date' => $validated['service_date'],
            'details' => $validated['details'],
            'status' => 'pending', // Default status is 'pending'
        ]);

        return redirect()->route('pemesanan')->with('success', 'Titik lokasi berhasil ditambahkan!');
    }

    // Show all bookings
    public function index()
    {
        $bookings = Booking::all(); // Fetch all bookings
        return view('pemesanan', compact('bookings'));
    }
}

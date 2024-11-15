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

        // Menyimpan pemesanan dan menyertakan user_id
        $booking = Booking::create([
            'user_id' => auth()->id(), // Menyertakan ID pengguna yang sedang login
            'vehicle_type' => $validated['vehicle_type'],
            'service_date' => $validated['service_date'],
            'details' => $validated['details'],
            'status' => 'pending',
        ]);

        // Jika permintaan adalah AJAX
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Pemesanan berhasil dibuat!',
            ]);
        }

        // Jika bukan AJAX, redirect ke halaman pemesanan
        return redirect()->route('pemesanan')->with('success', 'Pesanan Telah Ditambahkan!');
    }

    // Show all bookings
    public function index()
    {
        $bookings = Booking::all(); // Fetch all bookings
        return view('pemesanan', compact('bookings'));
    }
}

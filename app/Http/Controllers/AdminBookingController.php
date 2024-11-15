<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
    // Menampilkan daftar pemesanan
    public function index(Request $request)
    {
        $bookings = Booking::all();
        return view('admin.index',[
            'bookings' => $bookings
        ]);
    }

    // Mengupdate status pemesanan
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,completed',
        ]);

        $booking = Booking::findOrFail($id);
        $booking->status = $request->status;
        $booking->save();

        return response()->json(['success' => true, 'message' => 'Status berhasil diperbarui']);
    }
}

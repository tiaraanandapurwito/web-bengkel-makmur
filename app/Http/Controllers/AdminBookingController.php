<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
    public function index(Request $request)
    {
        $bookings = Booking::all(); // Anda bisa menambahkan filter atau pagination jika data banyak
        return view('admin.index', [
            'bookings' => $bookings
        ]);
    }

    // Mengupdate status pemesanan
    public function updateStatus(Request $request, $id)
    {
        // Validasi status yang dikirimkan
        $request->validate([
            'status' => 'required|in:pending,confirmed,completed', // Validasi status
        ]);

        try {
            // Cari booking berdasarkan ID
            $booking = Booking::findOrFail($id);

            // Update status
            $booking->status = $request->status;
            $booking->save();

            return response()->json([
                'success' => true, 
                'message' => 'Status berhasil diperbarui'
            ]);
        } catch (\Exception $e) {
            // Tangani jika terjadi kesalahan
            return response()->json([
                'success' => false, 
                'message' => 'Terjadi kesalahan saat memperbarui status. Silakan coba lagi.'
            ], 500);
        }
    }
}

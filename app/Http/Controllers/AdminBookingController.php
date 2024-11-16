<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
    public function index(Request $request)
{
    // Ambil data dengan filter status selain 'completed' dan gunakan eager loading
    $bookings = Booking::where('status', '!=', 'completed')
                        ->with('user') // Mengambil data user untuk menghindari query N+1
                        ->paginate(10); // Gunakan pagination (10 data per halaman)

    return view('admin.index', [
        'bookings' => $bookings
    ]);
}

    // Mengupdate status pemesanan
    public function updateStatus(Request $request)
    {
        $request->validate([
            'bookingId' => 'required|exists:bookings,id',
            'newStatus' => 'required|in:pending,confirmed,completed',
        ]);

        $booking = Booking::find($request->bookingId);
        $booking->status = $request->newStatus;

        // Jika status berubah menjadi completed, catat waktu penyelesaian
        if ($request->newStatus === 'completed' && !$booking->completed_at) {
            $booking->completed_at = now();
        }

        $booking->save();

        if ($request->newStatus === 'completed') {
            return redirect()->route('admin.HistoryBooking')->with('success', 'Pesanan dipindahkan ke history.');
        }

        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }

    public function history()
    {
        $completedBookings = Booking::where('status', 'completed')->orderBy('completed_at', 'desc')->get();

        return view('admin.HistoryBooking', compact('completedBookings'));
    }
}

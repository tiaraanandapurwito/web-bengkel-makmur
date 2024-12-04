<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminBookingController extends Controller
{
    public function index(Request $request)
    {
        // Ambil data dengan filter status selain 'completed' dan urutkan berdasarkan service_date
        $bookings = Booking::where('status', '!=', 'completed')
            ->with('user') // Mengambil data user untuk menghindari query N+1
            ->orderBy('service_date', 'asc') // Mengurutkan berdasarkan service_date
            ->paginate(10); // Gunakan pagination (10 data per halaman)

        return view('admin.index', [
            'bookings' => $bookings
        ]);
    }


    // Mengupdate status pemesanan
    public function updateStatus(Request $request)
    {
        // Validasi input
        $request->validate([
            'bookingId' => 'required|exists:bookings,id',
            'newStatus' => 'required|in:pending,confirmed,completed',
        ]);

        // Temukan booking berdasarkan ID
        $booking = Booking::findOrFail($request->bookingId);
        $booking->status = $request->newStatus;

        // Catat waktu penyelesaian jika status berubah menjadi completed
        if ($request->newStatus === 'completed' && !$booking->completed_at) {
            $booking->completed_at = now();
        }

        // Simpan perubahan status
        $booking->save();

        // Jika status completed, otomatis ubah status pesanan berikutnya
        if ($request->newStatus === 'completed') {
            // Ubah status pesanan pertama yang masih pending menjadi confirmed
            $nextPendingBooking = Booking::where('status', 'pending')
                ->orderBy('created_at', 'asc')
                ->first();

            if ($nextPendingBooking) {
                $nextPendingBooking->status = 'confirmed';
                $nextPendingBooking->save();
            }

            // Redirect ke halaman history jika status completed
            return redirect()->route('admin.HistoryBooking')->with('success', 'Pesanan dipindahkan ke history.');
        }

        // Cek jika ini adalah pesanan pertama yang perlu diubah menjadi confirmed
        if (Booking::where('status', 'pending')->count() === 0 && $request->newStatus === 'confirmed') {
            // Jika ini adalah pesanan pertama, ubah statusnya menjadi confirmed otomatis
            $booking->status = 'confirmed';
            $booking->save();
        }

        // Redirect kembali jika status bukan completed
        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }

    public function history()
    {
        $completedBookings = Booking::where('status', 'completed')->orderBy('completed_at', 'desc')->get();

        return view('admin.HistoryBooking', compact('completedBookings'));
    }

    public function exportPDF()
    {
        $completedBookings = Booking::where('status', 'completed')->get(); // Ganti sesuai kebutuhan
        $pdf = Pdf::loadView('pdf.pdfadmin', compact('completedBookings'))
            ->setPaper('a4', 'landscape');
        return $pdf->download('history_pemesanan_servis.pdf');
    }
}

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
        // Validasi data
        $validated = $request->validate([
            'vehicle_type' => 'required|string|max:255',
            'service_date' => 'required|date|after:today', // Tanggal harus setelah hari ini
            'details' => 'nullable|string|max:1000',
        ], [
            'vehicle_type.required' => 'Jenis kendaraan harus diisi.',
            'vehicle_type.string' => 'Jenis kendaraan harus berupa teks.',
            'service_date.required' => 'Tanggal servis harus diisi.',
            'service_date.date' => 'Tanggal servis tidak valid.',
            'service_date.after' => 'Tanggal servis harus setelah hari ini.',
            'details.string' => 'Detail harus berupa teks.',
        ]);

        try {
            // Simpan pemesanan
            $booking = Booking::create([
                'user_id' => auth()->id(), // ID pengguna yang login
                'vehicle_type' => $validated['vehicle_type'],
                'service_date' => $validated['service_date'],
                'details' => $validated['details'] ?? null, // Null jika tidak ada detail
                'status' => 'pending', // Status awal
            ]);

            // Jika permintaan adalah AJAX
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Pemesanan berhasil dibuat!',
                    'data' => $booking, // Return data pemesanan untuk kebutuhan front-end
                ], 201);
            }

            // Jika bukan AJAX, redirect ke halaman pemesanan
            return redirect()->route('pemesanan')->with('success', 'Pesanan telah ditambahkan!');
        } catch (\Exception $e) {
            // Log kesalahan untuk debugging
            \log::error('Error creating booking: ' . $e->getMessage());

            // Jika AJAX, berikan respons JSON dengan error
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan saat membuat pemesanan.',
                ], 500);
            }

            // Jika bukan AJAX, redirect dengan error
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat membuat pemesanan.']);
        }
    }

    // Show all bookings
    public function index()
{
    $userId = auth()->id(); // Ambil ID user yang sedang login

    // Ambil semua pemesanan user (belum selesai)
    $userBookings = Booking::where('user_id', $userId)
        ->where('status', '!=', 'completed')
        ->orderBy('created_at', 'asc') // Urutkan berdasarkan waktu pemesanan
        ->get();

    // Ambil semua pemesanan yang sudah dikonfirmasi untuk antrean global
    $confirmedBookings = Booking::where('status', '!=', 'completed')
        ->orderBy('created_at', 'asc') // Urutkan berdasarkan waktu pemesanan
        ->get();

    // Tambahkan nomor antrian global ke setiap pemesanan
    $confirmedBookings = $confirmedBookings->map(function ($booking, $index) {
        $booking->queue_number = $index + 1; // Nomor antrian global
        return $booking;
    });

    // Cari antrean yang sedang berlangsung
    $currentQueue = $confirmedBookings->firstWhere('status', 'confirmed');

    return view('pemesanan', compact('userBookings', 'confirmedBookings', 'currentQueue'));
}


    public function bookingHistory()
    {
        // Ambil pemesanan dengan status 'completed' milik user yang login
        $bookings = Booking::where('user_id', auth()->id())
            ->where('status', 'completed')
            ->orderBy('service_date', 'desc')
            ->get();

        return view('historypemesanan', compact('bookings'));
    }
}

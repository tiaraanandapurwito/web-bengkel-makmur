<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // Show the booking form
    public function create()
    {
        return view('dashboard');
    }


    public function getServices(Request $request)
    {
        $vehicleType = $request->vehicle_type;

        $services = Service::where('vehicle_type', $vehicleType)
            ->select('id', 'service_name', 'price')
            ->get();

        return response()->json($services);
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

        // Cek jika ada pesanan dengan status "confirmed"
        $isFirstBooking = Booking::where('status', 'confirmed')->count() == 0;

        // Tentukan nomor antrian untuk pemesanan yang baru
        $queueNumber = Booking::whereIn('status', ['pending', 'confirmed', 'completed'])->count() + 1;

        // Simpan pemesanan
        $booking = Booking::create([
            'user_id' => auth()->id(), // ID pengguna yang login
            'vehicle_type' => $validated['vehicle_type'],
            'service_id' => $request->service_id,
            'price' => $request->service_price,
            'service_date' => $validated['service_date'],
            'details' => $validated['details'] ?? null, // Null jika tidak ada detail
            'status' => $isFirstBooking ? 'confirmed' : 'pending', // Jika pesanan pertama, status langsung confirmed
            'queue_number' => $queueNumber, // Set nomor antrian
        ]);

        // Jika permintaan adalah AJAX
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Pemesanan berhasil dibuat!',
                'data' => $booking, // Return data pemesanan untuk kebutuhan front-end
            ], 201);
        }

        // Redirect ke halaman pemesanan jika tidak menggunakan AJAX
        return redirect()->route('pemesanan')->with('success', 'Pesanan telah ditambahkan!');
    }

    // Show all bookings
    public function index()
    {
        $userId = auth()->id(); // Ambil ID user yang sedang login

        // Ambil semua pemesanan user (belum selesai)
        $userBookings = Booking::where('user_id', $userId)
            ->where('status', '!=', 'completed')
            ->orderBy('service_date', 'asc') // Urutkan berdasarkan tanggal layanan
            ->get();

        // Ambil semua pemesanan yang sudah dikonfirmasi untuk antrean global
        $confirmedBookings = Booking::with('user') // Tambahkan relasi user
            ->where('status', '!=', 'completed')
            ->orderBy('service_date', 'asc') // Urutkan berdasarkan tanggal layanan
            ->get();

        // Cek apakah tanggal hari ini berbeda dengan tanggal terakhir antrean
        $today = \Carbon\Carbon::today()->format('Y-m-d');
        $lastConfirmedBooking = $confirmedBookings->where('status', 'confirmed')->last();

        if ($lastConfirmedBooking) {
            // Pastikan service_date adalah objek Carbon
            $lastConfirmedBookingDate = \Carbon\Carbon::parse($lastConfirmedBooking->service_date);

            // Bandingkan tanggal
            if ($lastConfirmedBookingDate->format('Y-m-d') !== $today) {
                // Reset nomor antrian
                $confirmedBookings->each(function ($booking, $index) use ($today) {
                    if (!$booking->queue_number || \Carbon\Carbon::parse($booking->service_date)->format('Y-m-d') !== $today) {
                        $booking->queue_number = $index + 1;
                        $booking->save();
                    }
                });
            }
        }

        // Cari antrean yang sedang berlangsung
        $currentQueue = $confirmedBookings->firstWhere('status', 'confirmed');

        // Tambahkan nama pemilik ke antrean aktif (jika ada)
        if ($currentQueue && $currentQueue->user) {
            $currentQueue->owner_name = $currentQueue->user->name; // Ambil nama pemilik dari relasi
        }

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

    public function getByVehicleType(Request $request)
    {
        $vehicleType = $request->input('vehicle_type');

        // Ambil layanan yang sesuai dengan jenis kendaraan yang dipilih
        $services = Service::where('vehicle_type', $vehicleType)->get();

        // Jika layanan tidak ditemukan
        if ($services->isEmpty()) {
            return '<option value="">Layanan tidak ditemukan</option>';
        }

        // Buat HTML partial untuk dropdown layanan
        $options = '<option value="">Pilih Layanan</option>';
        foreach ($services as $service) {
            $options .= "<option value='{$service->id}' data-price='{$service->price}'>{$service->service_name}</option>";
        }

        return $options;
    }
}

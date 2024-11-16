@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <h2 class="dashboard-title">Daftar Pemesanan Servis</h2>
        </div>
    </div>

    @php
        // Filter pemesanan untuk user yang sedang login
        $userBookings = $bookings->filter(function ($booking) {
            return $booking->user_id === auth()->id() && $booking->status !== 'completed';
        });

        // Ambil semua antrean yang masih berlaku dan urutkan
        $queueList = $bookings->where('status', '!=', 'completed')->sortBy('queue_number');

        // Cari posisi antrian untuk user yang login
        $userQueuePosition = $queueList->where('user_id', auth()->id())->first();
    @endphp

    @if ($userBookings->isEmpty())
        <div class="alert alert-info" role="alert">
            Tidak ada pemesanan servis yang tersedia.
        </div>
    @else
        <div class="row">
            <div class="col-lg-8">
                <div class="booking-list">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis Kendaraan</th>
                                <th>Tanggal Servis</th>
                                <th>Waktu Servis</th>
                                <th>Detail</th>
                                <th>Status</th>
                                <th>Antrian</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($userBookings->values() as $index => $booking)
                                <tr id="bookingItem_{{ $booking->id }}">
                                    <td>{{ $index + 1 }}</td> <!-- Nomor Pemesanan Berurutan -->
                                    <td>{{ $booking->vehicle_type }}</td>
                                    <td>{{ \Carbon\Carbon::parse($booking->service_date)->format('d M Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($booking->service_date)->format('H:i') }}</td>
                                    <td>{{ $booking->details ?? '-' }}</td>
                                    <td>
                                        <span
                                            class="badge
                                            @if ($booking->status === 'pending') bg-warning
                                            @elseif($booking->status === 'confirmed') bg-success
                                            @elseif($booking->status === 'completed') bg-primary @endif">
                                            {{ ucfirst($booking->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $booking->queue_number }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Posisi Antrian</h5>
                        @if ($userQueuePosition)
                            <p>Posisi antrian Anda saat ini: <strong>{{ $userQueuePosition->queue_number }}</strong></p>
                            <p>Waktu servis: <strong>{{ \Carbon\Carbon::parse($userQueuePosition->service_date)->format('H:i') }}</strong></p>
                        @else
                            <p>Anda tidak memiliki antrian saat ini.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

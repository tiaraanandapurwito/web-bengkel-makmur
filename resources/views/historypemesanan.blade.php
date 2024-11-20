@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <h2 class="dashboard-title">Riwayat Pemesanan Servis</h2>
        </div>
    </div>

    @if($bookings->isEmpty())
        <div class="alert alert-info" role="alert">
            Belum ada riwayat pemesanan servis.
        </div>
    @else
        <div class="booking-list">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis Kendaraan</th>
                        <th>Layanan</th>
                        <th>Harga</th>
                        <th>Tanggal Servis</th>
                        <th>Waktu Servis</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $index => $booking)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $booking->vehicle_type }}</td>
                            <td>{{ $booking->service->service_name ?? '-' }}</td>
                            <td>
                                {{ isset($booking->service->price) ? 'Rp' . number_format($booking->service->price, 0, ',', '.') : '-' }}
                            </td>
                            <td>{{ \Carbon\Carbon::parse($booking->service_date)->format('d M Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($booking->service_date)->format('H:i') }}</td>
                            <td>
                                @if($booking->details)
                                    {{ $booking->details }}
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection

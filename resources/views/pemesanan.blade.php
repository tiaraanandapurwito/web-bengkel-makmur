@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <h2 class="dashboard-title">Daftar Pemesanan Servis</h2>
        </div>
    </div>

    @if($bookings->isEmpty())
        <div class="alert alert-info" role="alert">
            Belum ada pemesanan servis.
        </div>
    @else
        <div class="booking-list">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>  <!-- Angka Pesanan -->
                        <th>Jenis Kendaraan</th>
                        <th>Tanggal Servis</th>
                        <th>Waktu Servis</th>
                        <th>Detail</th>
                        <th>Status</th>
                        @can('admin') <!-- Pengecekan hak akses admin -->
                            <th>Aksi</th> <!-- Kolom aksi untuk admin -->
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $index => $booking)
                        <tr id="bookingItem_{{ $booking->id }}">
                            <td>{{ $index + 1 }}</td>  <!-- Menampilkan nomor urut -->
                            <td>{{ $booking->vehicle_type }}</td>
                            <td>{{ \Carbon\Carbon::parse($booking->service_date)->format('d M Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($booking->service_date)->format('H:i') }}</td>
                            <td>
                                @if($booking->details)
                                    {{ $booking->details }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                <span class="badge
                                    @if($booking->status === 'pending') bg-warning
                                    @elseif($booking->status === 'confirmed') bg-success
                                    @elseif($booking->status === 'completed') bg-primary
                                    @endif">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </td>
                            @can('admin') <!-- Hanya admin yang dapat melihat tombol aksi -->
                                <td>
                                    @if($booking->status === 'pending')
                                        <form action="{{ route('admin.updateBookingStatus', $booking->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-success">Terima Pemesanan</button>
                                        </form>
                                    @elseif($booking->status === 'confirmed')
                                        <form action="{{ route('admin.updateBookingStatus', $booking->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-primary">Tandai Selesai</button>
                                        </form>
                                    @endif
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection

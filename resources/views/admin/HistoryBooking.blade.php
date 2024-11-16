@extends('layout.app')

@section('title', 'History Pemesanan Servis')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 mb-4">
            <h2>History Pemesanan Servis</h2>
            {{-- <a href="{{ route('admin.index') }}" class="btn btn-primary">Kembali ke Kelola Pesanan</a> --}}
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama User</th>
                    <th>Jenis Kendaraan</th>
                    <th>Tanggal Servis</th>
                    <th>Catatan</th>
                    <th>Tanggal Selesai</th>
                </tr>
            </thead>
            <tbody>
                @forelse($completedBookings as $index => $booking)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $booking->user->name ?? 'Tidak tersedia' }}</td>
                    <td>{{ $booking->vehicle_type ?? 'Tidak tersedia' }}</td>
                    <td>{{ \Carbon\Carbon::parse($booking->service_date)->isoFormat('D MMMM YYYY') }}</td>
                    <td>{{ $booking->details ?? '-' }}</td>
                    <td>{{ \Carbon\Carbon::parse($booking->completed_at)->isoFormat('D MMMM YYYY') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada data history pemesanan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

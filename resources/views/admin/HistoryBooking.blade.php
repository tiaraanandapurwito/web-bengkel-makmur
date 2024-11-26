@extends('layout.app')

@section('title', 'History Pemesanan Servis')

@section('styles')
<style>
    :root {
        --primary-color: #3498db;
        --secondary-color: #2ecc71;
        --background-color: #f4f6f9;
        --text-color: #2c3e50;
    }

    body {
        background-color: var(--background-color);
        font-family: 'Inter', sans-serif;
        color: var(--text-color);
    }

    .service-history-container {
        padding: 2rem 0;
    }

    .card-custom {
        border: none;
        border-radius: 12px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
    }

    .card-header-custom {
        background-color: var(--primary-color);
        color: white;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
        padding: 1rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .table-services {
        border-radius: 12px;
        overflow: hidden;
    }

    .table-services thead {
        background-color: var(--primary-color);
        color: white;
    }

    .table-hover tbody tr:hover {
        background-color: rgba(52, 152, 219, 0.05);
    }

    /* Responsive Table Design for Mobile */
    @media (max-width: 768px) {
        .table-responsive {
            border: none;
        }

        .table-responsive thead {
            display: none;
        }

        .table-responsive tr {
            display: block;
            margin-bottom: 1rem;
            border: 2px solid var(--primary-color);
            border-radius: 10px;
            overflow: hidden;
        }

        .table-responsive td {
            display: block;
            text-align: right;
            border-bottom: 1px solid #ddd;
            padding: 0.75rem;
        }

        .table-responsive td::before {
            content: attr(data-label);
            float: left;
            font-weight: bold;
            text-transform: uppercase;
        }

        .table-responsive td:last-child {
            border-bottom: none;
        }
    }

    /* Status Badge Styling */
    .badge-completed {
        background-color: var(--secondary-color);
        color: white;
        padding: 0.5rem;
        border-radius: 6px;
    }

    .empty-state {
        text-align: center;
        padding: 3rem;
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .empty-state i {
        font-size: 4rem;
        color: var(--primary-color);
        margin-bottom: 1rem;
    }
</style>
@endsection

@section('content')
<div class="container service-history-container">
    <div class="card card-custom">
        <div class="card-header card-header-custom">
            <h2 class="mb-0">
                <i class="fas fa-history me-2"></i>History Pemesanan Servis
            </h2>
            @if(count($completedBookings) > 0)
                <span class="badge badge-completed">
                    {{ count($completedBookings) }} Total Servis
                </span>
            @endif
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                @if(count($completedBookings) > 0)
                    <table class="table table-hover table-striped mb-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama User</th>
                                <th>Jenis Kendaraan</th>
                                <th>Layanan</th>
                                <th>Harga</th>
                                <th>Tanggal Servis</th>
                                <th>Catatan</th>
                                <th>Tanggal Selesai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($completedBookings as $index => $booking)
                            <tr>
                                <td data-label="No">{{ $index + 1 }}</td>
                                <td data-label="Nama User">{{ $booking->user->name ?? 'Tidak tersedia' }}</td>
                                <td data-label="Jenis Kendaraan">{{ $booking->vehicle_type ?? 'Tidak tersedia' }}</td>
                                <td data-label="Layanan">{{ $booking->service->service_name ?? '-' }}</td>
                                <td data-label="Harga">
                                    {{ isset($booking->service->price) ? 'Rp' . number_format($booking->service->price, 0, ',', '.') : '-' }}
                                </td>
                                <td data-label="Tanggal Servis">
                                    {{ \Carbon\Carbon::parse($booking->service_date)->isoFormat('D MMMM YYYY') }}
                                </td>
                                <td data-label="Catatan">{{ $booking->details ?? '-' }}</td>
                                <td data-label="Tanggal Selesai">
                                    {{ \Carbon\Carbon::parse($booking->completed_at)->isoFormat('D MMMM YYYY') }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="empty-state">
                        <i class="fas fa-clipboard-list"></i>
                        <h4>Belum ada data history pemesanan</h4>
                        <p>Saat ini tidak ada riwayat servis yang tersedia.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection

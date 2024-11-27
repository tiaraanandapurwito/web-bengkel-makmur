@extends('layout.app')

@section('content')
<div class="container px-4 py-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 gap-6">
        <!-- Informasi Antrian -->
        <div class="w-full">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title mb-3 flex items-center">
                        <i class="fas fa-clock me-2"></i>
                        <span class="text-sm sm:text-base">Antrian Sedang Berlangsung</span>
                    </h5>
                    @if ($currentQueue)
                    <div class="alert alert-success border-0 flex flex-col sm:flex-row items-center space-y-2 sm:space-y-0 sm:space-x-3">
                        <div class="flex-shrink-0 self-start sm:self-center">
                            @php
                            $currentIcon = match(strtolower($currentQueue->vehicle_type)) {
                            'mobil' => 'fa-car',
                            'motor' => 'fa-motorcycle',
                            'truk' => 'fa-truck',
                            default => 'fa-car-side'
                            };
                            @endphp
                            <i class="fas {{ $currentIcon }} fa-2x me-3"></i>
                        </div>
                        <div class="flex-grow-1 w-full sm:w-auto">
                            <h6 class="alert-heading mb-1 text-sm sm:text-base">Antrian Saat Ini:</h6>
                            <div class="grid grid-cols-2 gap-1 text-sm sm:text-base">
                                <p class="mb-1">Kendaraan:</p>
                                <p class="mb-1 font-bold">{{ $currentQueue->vehicle_type }}</p>
                                <p class="mb-1">Status:</p>
                                <p class="mb-1 font-bold">{{ ucfirst($currentQueue->status) }}</p>
                                <p class="mb-0">Nomor Antrian:</p>
                                <p class="mb-0 font-bold">{{ $currentQueue->queue_number }}</p>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="alert alert-info border-0 flex items-center">
                        <i class="fas fa-info-circle me-2"></i>
                        <span class="text-sm sm:text-base">Tidak ada antrean aktif saat ini.</span>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Tabel Pemesanan User -->
        <div class="w-full">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title mb-3 flex items-center">
                        <i class="fas fa-list-alt me-2"></i>
                        <span class="text-sm sm:text-base">Daftar Pemesanan Anda</span>
                    </h5>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle w-full">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" class="text-center hidden sm:table-cell">No</th>
                                    <th scope="col" class="sm:text-center">Detail Pemesanan</th>
                                    <th scope="col" class="hidden sm:table-cell">Status</th>
                                    <th scope="col" class="hidden sm:table-cell">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($userBookings as $index => $booking)
                                @php
                                $queueNumber = $confirmedBookings->pluck('id')->search($booking->id);
                                $queueNumber = $queueNumber !== false ? $queueNumber + 1 : '-';
                                $isUserTurn = $currentQueue && $currentQueue->id === $booking->id;

                                $vehicleIcon = match(strtolower($booking->vehicle_type)) {
                                'mobil' => 'fa-car',
                                'motor' => 'fa-motorcycle',
                                'truk' => 'fa-truck',
                                default => 'fa-car-side'
                                };
                                @endphp
                                <tr class="block sm:table-row border-b sm:border-0">
                                    <td class="text-center hidden sm:table-cell">{{ $index + 1 }}</td>
                                    <td class="block sm:table-cell">
                                        <div class="flex flex-col sm:flex-row items-start sm:items-center">
                                            <div class="mb-2 sm:mb-0 sm:mr-3">
                                                <i class="fas {{ $vehicleIcon }} text-secondary"></i>
                                            </div>
                                            <div>
                                                <div class="font-bold">{{ $booking->vehicle_type }}</div>
                                                <div class="text-sm text-gray-600">{{ $booking->service->service_name ?? '-' }}</div>
                                                <div class="text-sm text-gray-600">
                                                    Harga: {{ isset($booking->service->price) ? 'Rp' . number_format($booking->service->price, 0, ',', '.') : '-' }}
                                                </div>
                                                <div class="text-sm text-gray-600">
                                                    <i class="far fa-calendar-alt me-2 text-secondary"></i>
                                                    {{ \Carbon\Carbon::parse($booking->service_date)->format('d M Y H:i') }}
                                                </div>
                                                <div class="sm:hidden mt-2">
                                                    <span class="badge rounded-pill
                                                        @if ($booking->status === 'pending') bg-warning text-dark
                                                        @elseif ($booking->status === 'confirmed') bg-success
                                                        @elseif ($booking->status === 'completed') bg-primary @endif">
                                                        {{ ucfirst($booking->status) }}
                                                    </span>
                                                </div>
                                                <div class="sm:hidden mt-2">
                                                    @if ($isUserTurn)
                                                    <span class="text-success">
                                                        <i class="fas fa-check-circle me-1"></i>
                                                        Giliran Anda
                                                    </span>
                                                    @elseif ($queueNumber !== '-')
                                                    <span class="text-muted">
                                                        <i class="fas fa-clock me-1"></i>
                                                        Belum giliran
                                                    </span>
                                                    @else
                                                    <span class="text-danger">
                                                        <i class="fas fa-times-circle me-1"></i>
                                                        Tidak masuk antrean
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="hidden sm:table-cell text-center">
                                        <span class="badge rounded-pill
                                            @if ($booking->status === 'pending') bg-warning text-dark
                                            @elseif ($booking->status === 'confirmed') bg-success
                                            @elseif ($booking->status === 'completed') bg-primary @endif">
                                            {{ ucfirst($booking->status) }}
                                        </span>
                                    </td>
                                    <td class="hidden sm:table-cell">
                                        @if ($isUserTurn)
                                        <span class="text-success">
                                            <i class="fas fa-check-circle me-1"></i>
                                            Giliran Anda
                                        </span>
                                        @elseif ($queueNumber !== '-')
                                        <span class="text-muted">
                                            <i class="fas fa-clock me-1"></i>
                                            Belum giliran
                                        </span>
                                        @else
                                        <span class="text-danger">
                                            <i class="fas fa-times-circle me-1"></i>
                                            Tidak masuk antrean
                                        </span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tambahkan CSS custom -->
<style>
    .card {
        border-radius: 10px;
        border: none;
        margin-bottom: 1.5rem;
    }

    /* .table> :not(caption)>*>* {
        padding: 1rem 0.75rem;
    } */

    .badge {
        padding: 0.5em 1em;
    }

    .alert {
        margin-bottom: 0;
    }

    .table-responsive {
        border-radius: 8px;
    }

    .table thead th {
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.875rem;
        letter-spacing: 0.025em;
    }

    @media (max-width: 576px) {
    /* Perbaikan Tabel Responsif */
    .table-responsive {
        border: none;
        overflow-x: auto;
        padding: 0;
    }

    .table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
    }

    .table thead {
        display: none; /* Sembunyikan header pada layar kecil */
    }

    .table tbody tr {
        display: block;
        margin-bottom: 1rem;
        border: 1px solid #e5e7eb; /* Warna border yang lebih lembut */
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        padding: 1rem;
        background-color: #ffffff;
        transition: all 0.3s ease;
    }

    .table tbody tr:hover {
        box-shadow: 0 6px 8px rgba(0, 0, 0, 0.1);
        transform: translateY(-2px);
    }

    .table tbody td {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.75rem 0;
        border-bottom: 1px solid #f3f4f6;
    }

    .table tbody td:last-child {
        border-bottom: none;
    }

    .table tbody td .flex {
        width: 100%;
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    /* Styling untuk ikon dan informasi */
    .table tbody td i {
        color: #6b7280;
        margin-right: 0.75rem;
        font-size: 1.25rem;
    }

    /* Status dan Badge */
    .badge {
        font-size: 0.75rem;
        padding: 0.35em 0.65em;
        border-radius: 9999px;
        font-weight: 500;
    }

    .badge.bg-warning {
        background-color: #fbbf24;
        color: #7c2d12;
    }

    .badge.bg-success {
        background-color: #34d399;
        color: #064e3b;
    }

    .badge.bg-primary {
        background-color: #60a5fa;
        color: #1e3a8a;
    }

    /* Informasi Detail */
    .text-sm {
        font-size: 0.8rem;
        color: #6b7280;
    }

    .font-bold {
        font-size: 0.95rem;
        font-weight: 600;
        color: #111827;
    }

    /* Status Tambahan */
    .text-success,
    .text-danger,
    .text-muted {
        font-size: 0.8rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .text-success i,
    .text-danger i,
    .text-muted i {
        margin-right: 0.5rem;
        font-size: 1rem;
    }
}
</style>
@endsection

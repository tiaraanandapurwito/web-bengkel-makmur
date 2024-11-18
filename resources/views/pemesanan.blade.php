@extends('layout.app')

@section('content')
<div class="container py-4">
    <div class="row g-4">
        <!-- Informasi Antrian -->
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title mb-3">
                        <i class="fas fa-clock me-2"></i>
                        Antrian Sedang Berlangsung
                    </h5>
                    @if ($currentQueue)
                        <div class="alert alert-success border-0 d-flex align-items-center">
                            <div class="flex-shrink-0">
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
                            <div class="flex-grow-1">
                                <h6 class="alert-heading mb-1">Antrian Saat Ini:</h6>
                                <p class="mb-1">Kendaraan: <strong>{{ $currentQueue->vehicle_type }}</strong></p>
                                <p class="mb-1">Status: <strong>{{ ucfirst($currentQueue->status) }}</strong></p>
                                <p class="mb-0">Nomor Antrian: <strong>{{ $currentQueue->queue_number }}</strong></p>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-info border-0">
                            <i class="fas fa-info-circle me-2"></i>
                            Tidak ada antrean aktif saat ini.
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Tabel Pemesanan User -->
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title mb-3">
                        <i class="fas fa-list-alt me-2"></i>
                        Daftar Pemesanan Anda
                    </h5>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col">Jenis Kendaraan</th>
                                    <th scope="col">Tanggal Servis</th>
                                    <th scope="col" class="text-center">Status</th>
                                    <th scope="col" class="text-center">Antrian</th>
                                    <th scope="col">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($userBookings as $index => $booking)
                                    @php
                                        $queueNumber = $confirmedBookings->pluck('id')->search($booking->id);
                                        $queueNumber = $queueNumber !== false ? $queueNumber + 1 : '-';
                                        $isUserTurn = $currentQueue && $currentQueue->id === $booking->id;

                                        // Menentukan ikon berdasarkan jenis kendaraan
                                        $vehicleIcon = match(strtolower($booking->vehicle_type)) {
                                            'mobil' => 'fa-car',
                                            'motor' => 'fa-motorcycle',
                                            'truk' => 'fa-truck',
                                            default => 'fa-car-side'
                                        };
                                    @endphp
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td>
                                            <i class="fas {{ $vehicleIcon }} me-2 text-secondary"></i>
                                            {{ $booking->vehicle_type }}
                                        </td>
                                        <td>
                                            <i class="far fa-calendar-alt me-2 text-secondary"></i>
                                            {{ \Carbon\Carbon::parse($booking->service_date)->format('d M Y H:i') }}
                                        </td>
                                        <td class="text-center">
                                            <span class="badge rounded-pill
                                                @if ($booking->status === 'pending') bg-warning text-dark
                                                @elseif ($booking->status === 'confirmed') bg-success
                                                @elseif ($booking->status === 'completed') bg-primary @endif">
                                                {{ ucfirst($booking->status) }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <span class="fw-bold">{{ $queueNumber }}</span>
                                        </td>
                                        <td>
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
    }

    .table > :not(caption) > * > * {
        padding: 1rem 0.75rem;
    }

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
</style>
@endsection

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
                            <span>Antrian Sedang Berlangsung</span>
                        </h5>
                        @if ($currentQueue)
                            <div class="alert alert-success border-0 d-flex align-items-start">
                                <div>
                                    <i
                                        class="fas fa-{{ strtolower($currentQueue->vehicle_type) === 'mobil' ? 'car' : (strtolower($currentQueue->vehicle_type) === 'motor' ? 'motorcycle' : 'truck') }} fa-2x me-3"></i>
                                </div>
                                <div>
                                    <p class="mb-1"><strong>Kendaraan:</strong> {{ $currentQueue->vehicle_type }}</p>
                                    <p class="mb-1"><strong>Status:</strong> {{ ucfirst($currentQueue->status) }}</p>
                                    <p class="mb-1"><strong>Nomor Antrian:</strong> {{ $currentQueue->queue_number }}</p>
                                    <p class="mb-0"><strong>Pemilik:</strong>
                                        {{ $currentQueue->owner_name ?? 'Tidak diketahui' }}</p>
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
            <div class="w-full">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title mb-3">
                            <i class="fas fa-list-alt me-2"></i>
                            Daftar Pemesanan Anda
                        </h5>
                        <div class="table-responsive">
                            <table class="table table-hover align-middle w-100">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Detail Pemesanan</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($userBookings as $index => $booking)
                                        @php
                                            $queueNumber = $confirmedBookings->pluck('id')->search($booking->id);
                                            $queueNumber = $queueNumber !== false ? $queueNumber + 1 : '-';
                                            $isUserTurn = $currentQueue && $currentQueue->id === $booking->id;
                                        @endphp
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                <i
                                                    class="fas fa-{{ strtolower($booking->vehicle_type) === 'mobil' ? 'car' : (strtolower($booking->vehicle_type) === 'motor' ? 'motorcycle' : 'truck') }} text-secondary me-2"></i>
                                                {{ $booking->vehicle_type }} - {{ $booking->service->service_name ?? '-' }}
                                                <br>
                                                <small>
                                                    <i class="far fa-calendar-alt me-1 text-secondary"></i>
                                                    {{ \Carbon\Carbon::parse($booking->service_date)->format('d M Y H:i') }}
                                                </small>
                                            </td>
                                            <td>
                                                <span
                                                    class="badge rounded-pill
                                            @if ($booking->status === 'pending') bg-warning text-dark
                                            @elseif ($booking->status === 'confirmed') bg-success
                                            @elseif ($booking->status === 'completed') bg-primary @endif">
                                                    {{ ucfirst($booking->status) }}
                                                </span>
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

                        <!-- Tambahkan Media Query CSS -->
                        <style>
                            .card {
                                border-radius: 12px;
                                border: none;
                                margin-bottom: 1.5rem;
                                /* Memberikan jarak antar card */
                                background-color: #ffffff;
                                transition: box-shadow 0.3s ease;
                            }

                            .card:hover {
                                box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
                            }

                            @media (max-width: 768px) {
                                .card {
                                    margin-bottom: 1rem;
                                }
                                .table-responsive .table tbody tr td {
                                    font-size: 0.85rem;
                                    padding: 0.5rem;
                                }

                                .table-responsive .table thead th {
                                    font-size: 0.9rem;
                                }

                                .table-responsive .badge {
                                    font-size: 0.75rem;
                                    padding: 0.2em 0.5em;
                                }
                            }

                            @media (max-width: 576px) {
                                .table-responsive .table tbody tr {
                                    display: flex;
                                    flex-direction: column;
                                    border-bottom: 1px solid #ddd;
                                }

                                .table-responsive .table tbody tr td {
                                    /* display: flex; */
                                    justify-content: space-between;
                                    padding: 0.4rem;
                                    font-size: 0.8rem;
                                }

                                .table-responsive .table tbody tr td:before {
                                    content: attr(data-label);
                                    flex-basis: 40%;
                                    font-weight: bold;
                                    text-transform: uppercase;
                                }

                                .table-responsive .table thead {
                                    display: none;
                                }
                            }
                        </style>
                    @endsection

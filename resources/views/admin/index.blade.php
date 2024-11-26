@extends('layout.app')

@section('title', 'Kelola Pemesanan Servis Kendaraan')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-4">
                <h2>Kelola Pemesanan Servis</h2>
            </div>
        </div>

        <style>
            @media (max-width: 768px) {
                table thead {
                    display: none;
                }

                table tbody tr {
                    display: block;
                    margin-bottom: 1rem;
                }

                table tbody tr td {
                    display: flex;
                    justify-content: space-between;
                    padding: 0.5rem;
                    border: none;
                    border-bottom: 1px solid #ddd;
                }

                table tbody tr td:last-child {
                    border-bottom: none;
                }

                .btn-change-status {
                    margin-top: 0.5rem;
                }
            }
        </style>

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama User</th>
                        <th>Jenis Kendaraan</th>
                        <th>Layanan</th>
                        <th>Harga</th>
                        <th>Tanggal Servis</th>
                        <th>Catatan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $index => $booking)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $booking->user->name ?? 'Tidak tersedia' }}</td>
                            <td>{{ $booking->vehicle_type ?? 'Tidak tersedia' }}</td>
                            <td>{{ $booking->service->service_name ?? '-' }}</td>
                            <td>{{ isset($booking->service->price) ? 'Rp' . number_format($booking->service->price, 0, ',', '.') : '-' }}
                            </td>
                            <td>{{ \Carbon\Carbon::parse($booking->service_date)->isoFormat('D MMMM YYYY') }}</td>
                            <td>{{ $booking->details ?? '-' }}</td>
                            <td>
                                <span
                                    class="badge
                        @if ($booking->status === 'pending') bg-warning
                        @elseif($booking->status === 'confirmed') bg-success
                        @elseif($booking->status === 'completed') bg-secondary @endif">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary btn-change-status" data-id="{{ $booking->id }}"
                                    data-status="{{ $booking->status }}" data-bs-toggle="modal"
                                    data-bs-target="#statusModal">
                                    Ubah Status
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">Tidak ada data pemesanan aktif.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Modal Ubah Status -->
        <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" action="{{ route('bookings.update-status') }}">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="statusModalLabel">Ubah Status Pemesanan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="bookingId" name="bookingId">
                            <div class="mb-3">
                                <label for="newStatus" class="form-label">Status Baru</label>
                                <select id="newStatus" name="newStatus" class="form-select">
                                    <option value="pending">Pending</option>
                                    <option value="confirmed">Confirmed</option>
                                    <option value="completed">Completed</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const statusModal = document.getElementById('statusModal');

            document.querySelectorAll('.btn-change-status').forEach(button => {
                button.addEventListener('click', () => {
                    const bookingId = button.dataset.id;
                    const currentStatus = button.dataset.status;

                    // Set data ke modal
                    statusModal.querySelector('#bookingId').value = bookingId;
                    statusModal.querySelector('#newStatus').value = currentStatus;
                });
            });
        });
    </script>
@endsection

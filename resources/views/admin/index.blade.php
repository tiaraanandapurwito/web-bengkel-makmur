@extends('layout.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 mb-4">
            <h2>Kelola Pemesanan Servis</h2>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama User</th>
                    <th>Jenis Kendaraan</th>
                    <th>Tanggal Servis</th>
                    <th>Catatan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $index => $booking)
                <tr id="bookingRow_{{ $booking->id }}">
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $booking->user->name ?? 'Data tidak tersedia' }}</td>
                    <td>{{ $booking->vehicle_type ?? 'Data tidak tersedia' }}</td>
                    <td>{{ \Carbon\Carbon::parse($booking->service_date)->format('d M Y') ?? 'Data tidak tersedia' }}</td>
                    <td>{{ $booking->details ?? 'Data tidak tersedia' }}</td>
                    <td>
                        <span class="badge
                            @if($booking->status === 'pending') bg-warning
                            @elseif($booking->status === 'confirmed') bg-success
                            @elseif($booking->status === 'completed') bg-primary
                            @else bg-secondary
                            @endif">
                            {{ ucfirst($booking->status ?? 'Data tidak tersedia') }}
                        </span>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary btn-change-status"
                                data-id="{{ $booking->id }}"
                                data-status="{{ $booking->status }}">
                            Ubah Status
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal Ubah Status -->
    <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="statusModalLabel">Ubah Status Pemesanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="statusForm">
                        <input type="hidden" id="bookingId" name="bookingId">
                        <div class="mb-3">
                            <label for="newStatus" class="form-label">Status Baru</label>
                            <select id="newStatus" name="newStatus" class="form-select">
                                <option value="pending">Pending</option>
                                <option value="confirmed">Confirmed</option>
                                <option value="completed">Completed</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const statusModal = new bootstrap.Modal(document.getElementById('statusModal'));
        const statusForm = document.getElementById('statusForm');

        document.querySelectorAll('.btn-change-status').forEach(button => {
            button.addEventListener('click', function () {
                const bookingId = this.dataset.id;
                const currentStatus = this.dataset.status;

                document.getElementById('bookingId').value = bookingId;
                document.getElementById('newStatus').value = currentStatus;

                statusModal.show();
            });
        });

        statusForm.addEventListener('submit', function (e) {
            e.preventDefault();

            const bookingId = document.getElementById('bookingId').value;
            const newStatus = document.getElementById('newStatus').value;

            fetch(`/admin/bookings/${bookingId}/status`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ status: newStatus })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const badge = document.querySelector(`#bookingRow_${bookingId} .badge`);
                    badge.className = `badge ${
                        newStatus === 'pending' ? 'bg-warning' :
                        newStatus === 'confirmed' ? 'bg-success' :
                        'bg-primary'
                    }`;
                    badge.textContent = newStatus.charAt(0).toUpperCase() + newStatus.slice(1);
                    statusModal.hide();
                }
            });
        });
    });
</script>
@endsection

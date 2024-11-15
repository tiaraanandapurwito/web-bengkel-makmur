@extends('layout.app')

@section('content')
<div class="dashboard-container">
    <div class="dashboard-content">

        <!-- Success Alert -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Form Pemesanan Section -->
        <div class="col-lg-6 mx-auto">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title mb-0">Pesan Servis Baru</h3>
                </div>
                <div class="card-body">
                    <form id="bookingForm" action="{{ route('user.booking.store') }}" method="POST" class="booking-form">
                        @csrf
                        <div class="mb-4">
                            <label for="vehicle_type" class="form-label">Jenis Kendaraan</label>
                            <select name="vehicle_type" class="form-select" id="vehicle_type" required>
                                <option value="">Pilih Jenis Kendaraan</option>
                                <option value="Mobil">Mobil</option>
                                <option value="Motor">Motor</option>
                                <option value="Truk">Truk</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="service_date" class="form-label">Tanggal Servis</label>
                            <input type="datetime-local" name="service_date" class="form-control" id="service_date" required>
                        </div>
                        <div class="mb-4">
                            <label for="details" class="form-label">Detail Servis (Opsional)</label>
                            <textarea name="details" class="form-control" id="details" rows="4" placeholder="Jelaskan keluhan atau permintaan khusus Anda"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-calendar-plus me-2"></i>Buat Pemesanan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .dashboard-container {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        min-height: 100vh;
        padding-top: 0;
        overflow: hidden; /* Prevent overflow */
    }

    .dashboard-content {
        width: 100%;
        max-width: 1200px;
        padding: 0;
        display: flex;
        flex-direction: column; /* Stack items vertically */
        height: 100%; /* Full height */
    }

    .card {
        border: none;
        border-radius: 16px;
        overflow: hidden;
    }

    .card-header {
        padding: 1.5rem;
        background-color: #4dabf7;
        border-bottom: 2px solid #e9ecef;
    }

    .booking-list {
        margin-top: 20px;
        overflow-y: auto; /* Allow scrolling if content exceeds height */
        max-height: 400px; /* Set a max height for the booking list */
    }

    .booking-item {
        border: 1px solid #e9ecef;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .booking-status {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background-color: #ffc107; /* Pending status color */
        margin-right: 10px;
    }

    .booking-content {
        flex-grow: 1;
    }

    .vehicle-type {
        font-weight: bold;
        font-size: 1.2rem;
    }

    .booking-details {
        font-size: 0.9rem;
        color: #6c757d;
    }

    .detail-item {
        display: flex;
        align-items: center;
        margin-right: 15px;
    }

    .detail-item i {
        margin-right: 5px;
    }

    .booking-notes {
        margin-top: 5px;
        font-style: italic;
        color: #495057;
    }

    /* Alert Styles */
    .alert {
        border-radius: 8px;
        border: none;
    }

    .alert-success {
        background-color: #d3f9d8;
        color: #2b8a3e;
    }

    /* Responsive Adjustments */
    @media (max-width: 992px) {
        .card-header {
            padding: 1rem;
        }

        .booking-form .form-control, .booking-form .form-select {
            padding: 0.6rem;
        }
    }
</style>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
    $('#bookingForm').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: $(this).serialize(),
            success: function (response) {
                var newBooking = `
                    <div class="booking-item" id="bookingItem_${response.booking.id}">
                        <div class="booking-status status-pending"></div>
                        <div class="booking-content">
                            <h4 class="vehicle-type">${response.booking.vehicle_type}</h4>
                            <div class="booking-details">
                                <div class="detail-item">
                                    <i class="far fa-calendar"></i> ${response.formattedDate}
                                </div>
                                <div class="detail-item">
                                    <i class="far fa-clock"></i> ${response.formattedTime}
                                </div>
                            </div>
                            <p class="booking-notes">${response.booking.details}</p>
                        </div>
                    </div>
                `;
                $('#bookingItems').prepend(newBooking);
                $('#bookingForm')[0].reset();

                Swal.fire({
                    icon: 'success',
                    title: 'Pemesanan Berhasil!',
                    text: 'Pemesanan servis baru telah dibuat.',
                    confirmButtonText: 'OK'
                });
            },
            error: function (error) {
                console.error(error);
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan',
                    text: 'Coba lagi nanti.',
                    confirmButtonText: 'OK'
                });
            }
        });
    });
});
</script>
@endsection

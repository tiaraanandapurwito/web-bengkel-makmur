@extends('layout.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Success Alert -->
            @if (session('success'))
                <div class="alert custom-alert alert-success alert-dismissible fade show" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle fa-2x me-3"></i>
                        <div>
                            {{ session('success') }}
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card booking-card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-gradient text-white py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-tools fa-2x me-3"></i>
                            <h3 class="card-title h4 mb-0" style="color: black">Pesan Servis Baru</h3>
                        </div>
                        <a href="{{ route('pemesanan') }}" class="btn btn-light btn-sm">
                            <i class="fas fa-list-alt me-1"></i>
                            Lihat Daftar Pemesanan
                        </a>
                    </div>
                </div>
                <div class="card-body p-4">
                    <form id="bookingForm" action="{{ route('user.booking.store') }}" method="POST" class="booking-form">
                        @csrf
                        <div class="mb-4">
                            <label for="vehicle_type" class="form-label fw-bold">
                                <i class="fas fa-car me-2 text-primary"></i>
                                Jenis Kendaraan
                            </label>
                            <select name="vehicle_type" class="form-select form-select-lg shadow-sm" id="vehicle_type" required>
                                <option value="">Pilih Jenis Kendaraan</option>
                                <option value="Mobil" data-icon="fa-car">Mobil</option>
                                <option value="Motor" data-icon="fa-motorcycle">Motor</option>
                                <option value="Truk" data-icon="fa-truck">Truk</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="service_date" class="form-label fw-bold">
                                <i class="fas fa-calendar-alt me-2 text-primary"></i>
                                Tanggal Servis
                            </label>
                            <input type="datetime-local" name="service_date" class="form-control form-control-lg shadow-sm"
                                   id="service_date" required>
                        </div>

                        <div class="mb-4">
                            <label for="details" class="form-label fw-bold">
                                <i class="fas fa-clipboard-list me-2 text-primary"></i>
                                Detail Servis (Opsional)
                            </label>
                            <textarea name="details" class="form-control form-control-lg shadow-sm" id="details"
                                      rows="4" placeholder="Jelaskan keluhan atau permintaan khusus Anda"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg w-100 submit-btn">
                            <i class="fas fa-calendar-plus me-2"></i>
                            Buat Pemesanan
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
    /* Card Styles */
    .booking-card {
        border-radius: 15px;
        overflow: hidden;
    }

    .card-header {
        background: linear-gradient(135deg, #4dabf7 0%, #2b6cb0 100%);
        border: none;
    }

    /* Form Controls */
    .form-control,
    .form-select {
        border: 1px solid #e2e8f0;
        padding: 0.75rem 1rem;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #4dabf7;
        box-shadow: 0 0 0 0.2rem rgba(77, 171, 247, 0.15);
    }

    .form-label {
        font-size: 0.95rem;
        margin-bottom: 0.5rem;
        color: #2d3748;
    }

    /* Alert Styling */
    .custom-alert {
        border-radius: 10px;
        border: none;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    /* Button Styling */
    .btn-light {
        color: #4dabf7;
        background-color: rgba(255, 255, 255, 0.9);
        border: none;
        font-weight: 500;
        padding: 0.5rem 1rem;
        border-radius: 7px;
        transition: all 0.3s ease;
    }

    .btn-light:hover {
        color: #2b6cb0;
        background-color: #ffffff;
        transform: translateY(-1px);
    }

    .submit-btn {
        padding: 1rem;
        font-weight: 600;
        border-radius: 10px;
        background: linear-gradient(135deg, #4dabf7 0%, #2b6cb0 100%);
        border: none;
        transition: all 0.3s ease;
    }

    .submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(45, 55, 72, 0.2);
    }

    /* Shadow Effects */
    .shadow-sm {
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1) !important;
    }

    /* Responsive Adjustments */
    @media (max-width: 992px) {
        .container {
            padding: 0 1rem;
        }

        .booking-card {
            margin: 0 0.5rem;
        }

        .card-header {
            padding: 1rem;
        }

        .form-control,
        .form-select {
            font-size: 16px; /* Prevents zoom on mobile */
        }
    }

    /* Input Focus Animation */
    .form-control:focus,
    .form-select:focus {
        transform: translateY(-1px);
    }

    /* Textarea Styling */
    textarea.form-control {
        resize: vertical;
        min-height: 120px;
    }
</style>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function() {
    // Update icon when vehicle type changes
    $('#vehicle_type').on('change', function() {
        const selectedOption = $(this).find('option:selected');
        const icon = selectedOption.data('icon');
        if (icon) {
            $(this).prev('label').find('i').removeClass().addClass(`fas ${icon} me-2 text-primary`);
        }
    });

    // Form submission handling
    $('#bookingForm').on('submit', function(e) {
        e.preventDefault();

        const submitBtn = $(this).find('.submit-btn');
        submitBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-2"></i>Memproses...');

        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Pemesanan Berhasil!',
                        text: response.message,
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#4dabf7'
                    }).then(() => {
                        $('#bookingForm')[0].reset();
                        // Reset vehicle icon
                        $('.form-label i.fas').first().removeClass().addClass('fas fa-car me-2 text-primary');
                    });
                }
            },
            error: function(xhr) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Terjadi kesalahan saat memproses data.',
                    confirmButtonText: 'Coba Lagi',
                    confirmButtonColor: '#4dabf7'
                });
            },
            complete: function() {
                submitBtn.prop('disabled', false).html('<i class="fas fa-calendar-plus me-2"></i>Buat Pemesanan');
            }
        });
    });
});
</script>
@endsection

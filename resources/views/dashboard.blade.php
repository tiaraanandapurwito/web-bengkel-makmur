@extends('layout.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <!-- Success Alert -->
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-0">Pesan Servis Baru</h3>
                        <a href="{{ route('pemesanan') }}" class="btn btn-light btn-sm">Lihat Daftar Pemesanan</a>
                    </div>
                    <div class="card-body">
                        <form id="bookingForm" action="{{ route('user.booking.store') }}" method="POST">
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
                                <input type="datetime-local" name="service_date" class="form-control" id="service_date"
                                    required>
                            </div>
                            <div class="mb-4">
                                <label for="details" class="form-label">Detail Servis (Opsional)</label>
                                <textarea name="details" class="form-control" id="details" rows="4"
                                    placeholder="Jelaskan keluhan atau permintaan khusus Anda"></textarea>
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
        .card-header {
            background-color: #4dabf7;
            border-bottom: 2px solid #e9ecef;
        }

        .btn-light {
            color: #4dabf7;
            background-color: #f8f9fa;
            border-color: #f8f9fa;
        }

        .btn-light:hover {
            color: #4dabf7;
            background-color: #e9ecef;
            border-color: #e9ecef;
        }

        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .card-header {
                padding: 1rem;
            }

            .booking-form .form-control,
            .booking-form .form-select {
                padding: 0.6rem;
            }
        }
    </style>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#bookingForm').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: response.message,
                                confirmButtonText: 'OK'
                            }).then(() => {
                                // Reset form jika sukses
                                $('#bookingForm')[0].reset();
                            });
                        }
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Kesalahan!',
                            text: 'Terjadi kesalahan saat memproses data.',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            });

        });
    </script>
@endsection

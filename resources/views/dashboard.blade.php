@extends('layout.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-9 col-xl-8">
            <div class="card booking-card border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="card-header bg-primary text-white p-4">
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <i class="fas fa-tools fa-3x text-white-50"></i>
                        </div>
                        <div>
                            <h2 class="h4 mb-1 text-white">Pesan Servis Baru</h2>
                            <p class="text-white-75 mb-0">Isi detail layanan servis kendaraan Anda</p>
                        </div>
                        <div class="ms-auto">
                            <a href="{{ route('pemesanan') }}" class="btn btn-outline-light btn-sm">
                                <i class="fas fa-list-alt me-2"></i>Daftar Pemesanan
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-5 bg-light">
                    <form id="bookingForm" action="{{ route('user.booking.store') }}" method="POST" class="booking-form">
                        @csrf
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select name="vehicle_type" class="form-select" id="vehicle_type" required>
                                        <option value="">Pilih Jenis Kendaraan</option>
                                        <option value="Mobil">Mobil</option>
                                        <option value="Motor">Motor</option>
                                        <option value="Truk">Truk</option>
                                    </select>
                                    <label for="vehicle_type">
                                        <i class="fas fa-car me-2 text-primary"></i>Jenis Kendaraan
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating mb-3" id="service_div">
                                    <select name="service_id" id="service_id" class="form-select" required>
                                        <option value="">Pilih Layanan</option>
                                    </select>
                                    <label for="service_id">
                                        <i class="fas fa-cogs me-2 text-primary"></i>Pilih Layanan
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" name="service_price" id="service_price"
                                           class="form-control" readonly>
                                    <label for="service_price">
                                        <i class="fas fa-tag me-2 text-primary"></i>Harga Layanan
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="datetime-local" name="service_date"
                                           class="form-control" id="service_date"
                                           required min="">
                                    <label for="service_date">
                                        <i class="fas fa-calendar-alt me-2 text-primary"></i>Tanggal Servis
                                    </label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating mb-3">
                                    <textarea name="details" class="form-control" id="details"
                                              placeholder="Jelaskan keluhan atau permintaan khusus"
                                              style="height: 120px"></textarea>
                                    <label for="details">
                                        <i class="fas fa-clipboard-list me-2 text-primary"></i>Detail Servis (Opsional)
                                    </label>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg w-100 mt-3 shadow">
                            <i class="fas fa-calendar-plus me-2"></i>Buat Pemesanan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-gradient-primary {
        background: linear-gradient(135deg, #3494e6, #2948ff);
    }

    .bg-overlay {
        background: linear-gradient(135deg, rgba(52, 148, 230, 0.1), rgba(41, 72, 255, 0.1));
        z-index: -1;
    }

    .hover-elevate {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .hover-elevate:hover {
        transform: translateY(-5px);
        box-shadow: 0 1rem 3rem rgba(41, 72, 255, 0.25) !important;
    }
</style>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
     document.addEventListener('DOMContentLoaded', function () {
        const serviceDateInput = document.getElementById('service_date');
        const vehicleTypeSelect = document.getElementById('vehicle_type');
        const serviceSelect = document.getElementById('service_id');
        const servicePriceInput = document.getElementById('service_price');

        // Set minimum waktu ke waktu saat ini
        function setMinDate() {
            const now = new Date();
            const offset = now.getTimezoneOffset() * 60000; // Menyesuaikan offset zona waktu
            const localNow = new Date(now - offset).toISOString().slice(0, 16); // Format ISO tanpa detik
            serviceDateInput.min = localNow; // Set atribut min
        }

        // Format harga ke Rupiah
        function formatRupiah(price) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            }).format(price);
        }

        // Membersihkan opsi layanan
        function clearServiceOptions() {
            while (serviceSelect.firstChild) {
                serviceSelect.removeChild(serviceSelect.firstChild);
            }
            const defaultOption = document.createElement('option');
            defaultOption.value = '';
            defaultOption.textContent = 'Pilih Layanan';
            serviceSelect.appendChild(defaultOption);
        }

        // Event listener untuk perubahan jenis kendaraan
        vehicleTypeSelect.addEventListener('change', function () {
            const selectedVehicle = this.value;
            clearServiceOptions();
            servicePriceInput.value = '';

            if (selectedVehicle) {
                fetch(`/get-services?vehicle_type=${encodeURIComponent(selectedVehicle)}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Gagal mengambil data layanan');
                    }
                    return response.json();
                })
                .then(services => {
                    if (services.length > 0) {
                        services.forEach(service => {
                            const option = document.createElement('option');
                            option.value = service.id;
                            option.textContent = service.service_name;
                            option.dataset.price = service.price;
                            serviceSelect.appendChild(option);
                        });
                    } else {
                        const noServiceOption = document.createElement('option');
                        noServiceOption.value = '';
                        noServiceOption.textContent = 'Tidak ada layanan tersedia';
                        serviceSelect.appendChild(noServiceOption);
                    }
                })
                .catch(error => {
                    console.error(error);
                    alert('Terjadi kesalahan saat memuat layanan. Silakan coba lagi.');
                });
            }
        });

        // Event listener untuk perubahan layanan
        serviceSelect.addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];
            if (selectedOption.value) {
                const price = parseFloat(selectedOption.dataset.price);
                servicePriceInput.value = formatRupiah(price);
            } else {
                servicePriceInput.value = '';
            }
        });

        // Inisialisasi minimum waktu
        setMinDate();
    });
</script>
@endsection

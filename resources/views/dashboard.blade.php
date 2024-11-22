@extends('layout.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
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
                    <form id="bookingForm" action="{{ route('user.booking.store') }}" method="POST"
                        class="booking-form">
                        @csrf
                        <div class="mb-4">
                            <label for="vehicle_type" class="form-label fw-bold">
                                <i class="fas fa-car me-2 text-primary"></i>
                                Jenis Kendaraan
                            </label>
                            <select name="vehicle_type" class="form-select form-select-lg shadow-sm" id="vehicle_type"
                                required>
                                <option value="">Pilih Jenis Kendaraan</option>
                                <option value="Mobil">Mobil</option>
                                <option value="Motor">Motor</option>
                                <option value="Truk">Truk</option>
                            </select>
                        </div>

                        <!-- Dropdown Layanan -->
                        <div class="mb-4" id="service_div">
                            <label for="service_id" class="form-label fw-bold">
                                <i class="fas fa-cogs me-2 text-primary"></i>
                                Pilih Layanan
                            </label>
                            <select name="service_id" id="service_id" class="form-select form-select-lg shadow-sm"
                                required>
                                <option value="">Pilih Layanan</option>
                            </select>
                        </div>

                        <!-- Menampilkan Harga Layanan -->
                        <div class="mb-4" id="service_price_div">
                            <label for="service_price" class="form-label fw-bold">
                                <i class="fas fa-tag me-2 text-primary"></i>
                                Harga Layanan
                            </label>
                            <input type="text" name="service_price" id="service_price"
                                class="form-control form-control-lg shadow-sm" readonly>
                        </div>
                        <div class="mb-4">
                            <label for="service_date" class="form-label fw-bold">
                                <i class="fas fa-calendar-alt me-2 text-primary"></i>
                                Tanggal Servis
                            </label>
                            <input type="datetime-local" name="service_date"
                                class="form-control form-control-lg shadow-sm"
                                id="service_date"
                                required
                                min="">
                        </div>
                        <div class="mb-4">
                            <label for="details" class="form-label fw-bold">
                                <i class="fas fa-clipboard-list me-2 text-primary"></i>
                                Detail Servis (Opsional)
                            </label>
                            <textarea name="details" class="form-control form-control-lg shadow-sm" id="details" rows="4"
                                placeholder="Jelaskan keluhan atau permintaan khusus Anda"></textarea>
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
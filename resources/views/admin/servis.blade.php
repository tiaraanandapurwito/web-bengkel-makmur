@extends('layout.app')

@section('styles')
<style>
    :root {
        --primary-color: #3498db;
        --secondary-color: #2ecc71;
        --danger-color: #e74c3c;
        --background-color: #f4f6f9;
    }

    body {
        background-color: var(--background-color);
        font-family: 'Inter', sans-serif;
    }

    .service-management {
        padding: 2rem 0;
    }

    .card-custom {
        border: none;
        border-radius: 12px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
    }

    .card-custom:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.12);
    }

    .card-header-custom {
        background-color: var(--primary-color);
        color: white;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
        padding: 1rem;
    }

    .table-services {
        border-radius: 12px;
        overflow: hidden;
    }

    .table-services thead {
        background-color: var(--primary-color);
        color: white;
    }

    .form-control, .form-select {
        border-radius: 8px;
        padding: 0.75rem;
        transition: all 0.3s ease;
    }

    .form-control:focus, .form-select:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
    }

    .btn-action {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
    }

    .btn-save {
        background-color: var(--secondary-color);
        border-color: var(--secondary-color);
    }

    .btn-save:hover {
        background-color: #27ae60;
        border-color: #27ae60;
    }

    .btn-edit {
        background-color: #f39c12;
        border-color: #f39c12;
    }

    .btn-edit:hover {
        background-color: #d35400;
        border-color: #d35400;
    }

    @media (max-width: 768px) {
        .service-management {
            padding: 1rem;
        }

        .card-custom {
            margin-bottom: 1rem;
        }

        .table-responsive {
            font-size: 0.9rem;
        }

        .btn-group {
            flex-direction: column;
            gap: 0.5rem;
        }

        .btn-action {
            width: 100%;
        }
    }
</style>
@endsection

@section('content')
<div class="container service-management">
    <div class="row g-4">
        <!-- Form Create/Edit -->
        <div class="col-lg-4">
            <div class="card card-custom">
                <div class="card-header card-header-custom">
                    <h4 class="mb-0">
                        <i class="fas fa-wrench me-2"></i>
                        {{ isset($service) ? 'Edit Layanan' : 'Tambah Layanan Baru' }}
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ isset($service) ? route('services.update', $service->id) : route('services.store') }}" method="POST">
                        @csrf
                        @if (isset($service))
                            @method('PUT')
                        @endif

                        <div class="mb-3">
                            <label for="vehicle_type" class="form-label">Jenis Kendaraan</label>
                            <select name="vehicle_type" id="vehicle_type" class="form-select" required>
                                <option value="">Pilih Jenis Kendaraan</option>
                                <option value="Mobil" {{ isset($service) && $service->vehicle_type == 'Mobil' ? 'selected' : '' }}>Mobil</option>
                                <option value="Motor" {{ isset($service) && $service->vehicle_type == 'Motor' ? 'selected' : '' }}>Motor</option>
                                <option value="Truk" {{ isset($service) && $service->vehicle_type == 'Truk' ? 'selected' : '' }}>Truk</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="service_name" class="form-label">Nama Layanan</label>
                            <input type="text" name="service_name" id="service_name"
                                   class="form-control"
                                   placeholder="Masukkan nama layanan"
                                   value="{{ $service->service_name ?? '' }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Harga Layanan</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" name="price" id="price"
                                       class="form-control"
                                       placeholder="Masukkan harga"
                                       value="{{ $service->price ?? '' }}" required>
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-between">
                            <button type="submit" class="btn btn-save btn-action flex-grow-1">
                                <i class="fas fa-save"></i>
                                {{ isset($service) ? 'Update Layanan' : 'Simpan Layanan' }}
                            </button>
                            @if (isset($service))
                                <a href="{{ route('admin.servis') }}" class="btn btn-secondary btn-action flex-grow-1">
                                    <i class="fas fa-times"></i>
                                    Batal
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Tabel Data Layanan -->
        <div class="col-lg-8">
            <div class="card card-custom table-services">
                <div class="card-header card-header-custom">
                    <h4 class="mb-0">
                        <i class="fas fa-list me-2"></i>
                        Daftar Layanan Servis
                    </h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center">NO</th>
                                    <th>Jenis Kendaraan</th>
                                    <th>Nama Layanan</th>
                                    <th>Harga</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($services as $service)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $service->vehicle_type }}</td>
                                        <td>{{ $service->service_name }}</td>
                                        <td>Rp {{ number_format($service->price, 0, ',', '.') }}</td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('admin.servis', ['service' => $service->id]) }}"
                                                   class="btn btn-edit btn-action btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('services.destroy', $service->id) }}"
                                                      method="POST"
                                                      class="d-inline delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button"
                                                            class="btn btn-danger btn-action btn-sm delete-button">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4">
                                            <div class="alert alert-info mb-0" role="alert">
                                                <i class="fas fa-info-circle me-2"></i>
                                                Tidak ada data layanan tersedia.
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- CDN untuk Font Awesome, SweetAlert2 -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // SweetAlert untuk notifikasi
    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 2500,
            timerProgressBar: true
        });
    @endif

    // Konfirmasi Hapus dengan SweetAlert
    document.querySelectorAll('.delete-button').forEach(button => {
        button.addEventListener('click', function () {
            const form = this.closest('.delete-form');

            Swal.fire({
                title: 'Konfirmasi Hapus Layanan',
                text: "Anda yakin ingin menghapus layanan ini? Proses tidak dapat dibatalkan.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e74c3c',
                cancelButtonColor: '#3498db',
                confirmButtonText: '<i class="fas fa-trash me-2"></i>Hapus',
                cancelButtonText: '<i class="fas fa-times me-2"></i>Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
@endsection

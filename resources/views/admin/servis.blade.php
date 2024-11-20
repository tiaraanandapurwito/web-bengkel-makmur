@extends('layout.app')

@section('content')
<div class="container">
    <h1>Pengaturan Layanan Servis</h1>

    <div class="row">
        <!-- Form Create/Edit -->
        <div class="col-md-4">
            <h3>{{ isset($service) ? 'Edit Layanan' : 'Tambah Layanan' }}</h3>
            <form action="{{ isset($service) ? route('services.update', $service->id) : route('services.store') }}" method="POST">
                @csrf
                @if (isset($service))
                    @method('PUT')
                @endif
                <div class="mb-3">
                    <label for="vehicle_type" class="form-label">Jenis Kendaraan</label>
                    <select name="vehicle_type" id="vehicle_type" class="form-select" required>
                        <option value="Mobil" {{ isset($service) && $service->vehicle_type == 'Mobil' ? 'selected' : '' }}>Mobil</option>
                        <option value="Motor" {{ isset($service) && $service->vehicle_type == 'Motor' ? 'selected' : '' }}>Motor</option>
                        <option value="Truk" {{ isset($service) && $service->vehicle_type == 'Truk' ? 'selected' : '' }}>Truk</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="service_name" class="form-label">Nama Layanan</label>
                    <input type="text" name="service_name" id="service_name" class="form-control" value="{{ $service->service_name ?? '' }}" required>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Harga</label>
                    <input type="number" name="price" id="price" class="form-control" value="{{ $service->price ?? '' }}" required>
                </div>
                <button type="submit" class="btn btn-success">{{ isset($service) ? 'Update' : 'Simpan' }}</button>
                @if (isset($service))
                    <a href="{{ route('admin.servis') }}" class="btn btn-secondary">Batal</a>
                @endif
            </form>
        </div>

        <!-- Tabel Data -->
        <div class="col-md-8">
            <h3>Daftar Layanan Servis</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Jenis Kendaraan</th>
                        <th>Nama Layanan</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($services as $service)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $service->vehicle_type }}</td>
                            <td>{{ $service->service_name }}</td>
                            <td>Rp {{ number_format($service->price, 0, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('admin.servis', ['service' => $service->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('services.destroy', $service->id) }}" method="POST" class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm delete-button">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data layanan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Tambahkan CDN SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // SweetAlert untuk pesan sukses
    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '{{ session('success') }}',
        });
    @endif

    // SweetAlert untuk konfirmasi penghapusan
    document.querySelectorAll('.delete-button').forEach(button => {
        button.addEventListener('click', function () {
            const form = this.closest('.delete-form');

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data ini akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Submit form jika user menekan "Ya, Hapus!"
                }
            });
        });
    });
</script>
@endsection

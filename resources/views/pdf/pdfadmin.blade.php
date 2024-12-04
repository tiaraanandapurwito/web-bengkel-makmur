<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History Pemesanan Servis</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            font-size: 12px;
            line-height: 1.6;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #3498db;
            color: white;
        }
    </style>
</head>
<body>
    <h2>History Pemesanan Servis</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama User</th>
                <th>Jenis Kendaraan</th>
                <th>Layanan</th>
                <th>Harga</th>
                <th>Tanggal Servis</th>
                <th>Catatan</th>
                <th>Tanggal Selesai</th>
            </tr>
        </thead>
        <tbody>
            @foreach($completedBookings as $index => $booking)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $booking->user->name ?? 'Tidak tersedia' }}</td>
                <td>{{ $booking->vehicle_type ?? 'Tidak tersedia' }}</td>
                <td>{{ $booking->service->service_name ?? '-' }}</td>
                <td>{{ isset($booking->service->price) ? 'Rp' . number_format($booking->service->price, 0, ',', '.') : '-' }}</td>
                <td>{{ \Carbon\Carbon::parse($booking->service_date)->isoFormat('D MMMM YYYY') }}</td>
                <td>{{ $booking->details ?? '-' }}</td>
                <td>{{ \Carbon\Carbon::parse($booking->completed_at)->isoFormat('D MMMM YYYY') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pemesanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: none;
            border-radius: 12px;
            background-color: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 2px solid #3498db;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #e3e3e3;
        }
        th {
            background-color: #3498db;
            color: white;
            font-weight: 500;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f5f7fa;
        }
        p {
            color: #2c3e50;
            line-height: 1.6;
        }
        strong {
            color: #2c3e50;
        }
        .thank-you {
            text-align: center;
            margin-top: 30px;
            padding: 15px;
            background-color: #3498db;
            color: white;
            border-radius: 8px;
        }
        .booking-info {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Struk Pemesanan Servis</h2>
        <div class="booking-info">
            <p><strong>No. Pemesanan:</strong> {{ $booking->id }}</p>
            <p><strong>Tanggal Servis:</strong> {{ \Carbon\Carbon::parse($booking->service_date)->format('d M Y') }}</p>
        </div>

        <table>
            <tr>
                <th>Jenis Kendaraan</th>
                <td>{{ $booking->vehicle_type }}</td>
            </tr>
            <tr>
                <th>Layanan</th>
                <td>{{ $booking->service->service_name ?? '-' }}</td>
            </tr>
            <tr>
                <th>Harga</th>
                <td>{{ isset($booking->service->price) ? 'Rp' . number_format($booking->service->price, 0, ',', '.') : '-' }}</td>
            </tr>
            <tr>
                <th>Waktu Servis</th>
                <td>{{ \Carbon\Carbon::parse($booking->service_date)->format('H:i') }}</td>
            </tr>
            <tr>
                <th>Detail</th>
                <td>{{ $booking->details ?? '-' }}</td>
            </tr>
        </table>
        <div class="thank-you">
            Terima kasih telah menggunakan layanan kami!
        </div>
    </div>
</body>
</html>

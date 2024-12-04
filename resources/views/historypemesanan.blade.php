@extends('layout.app')

@section('content')
    <style>
        /* Gaya Dasar */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        /* Table Styles */
        .table-container {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0;
            padding: 0;
        }

        th, td {
            text-align: left;
            padding: 12px 15px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f4f4f4;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Mobile Responsiveness */
        @media screen and (max-width: 768px) {
            .container {
                padding: 15px;
            }

            table {
                border: 0;
            }

            table tr {
                display: block;
                margin-bottom: 15px;
                background-color: #fff;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
                overflow: hidden;
            }

            table th {
                display: none;
            }

            table td {
                display: block;
                text-align: right;
                padding: 10px 15px;
                position: relative;
            }

            table td::before {
                content: attr(data-label);
                position: absolute;
                left: 15px;
                top: 10px;
                font-weight: bold;
                text-transform: uppercase;
                color: #555;
            }

            table td:last-child {
                border-bottom: 0;
            }
        }

        @media screen and (max-width: 480px) {
            h2 {
                font-size: 18px;
                text-align: center;
            }

            table td {
                font-size: 14px;
                padding: 8px 12px;
            }

            table td::before {
                font-size: 12px;
            }
        }
    </style>

    <div class="container">
        <h2>Riwayat Pemesanan Servis</h2>

        @if ($bookings->isEmpty())
            <div class="alert alert-info" role="alert">
                Belum ada riwayat pemesanan servis.
            </div>
        @else
            <div class="table-container">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis Kendaraan</th>
                            <th>Layanan</th>
                            <th>Harga</th>
                            <th>Tanggal Servis</th>
                            <th>Waktu Servis</th>
                            <th>Detail</th>
                            <th>Cetak</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $index => $booking)
                            <tr>
                                <td data-label="No">{{ $index + 1 }}</td>
                                <td data-label="Jenis Kendaraan">{{ $booking->vehicle_type }}</td>
                                <td data-label="Layanan">{{ $booking->service->service_name ?? '-' }}</td>
                                <td data-label="Harga">
                                    {{ isset($booking->service->price) ? 'Rp' . number_format($booking->service->price, 0, ',', '.') : '-' }}
                                </td>
                                <td data-label="Tanggal Servis">
                                    {{ \Carbon\Carbon::parse($booking->service_date)->format('d M Y') }}</td>
                                <td data-label="Waktu Servis">
                                    {{ \Carbon\Carbon::parse($booking->service_date)->format('H:i') }}</td>
                                <td data-label="Detail">{{ $booking->details ?? '-' }}</td>
                                <td data-label="Cetak">
                                    <a href="{{ route('bookings.print', $booking->id) }}" class="btn btn-primary btn-sm" target="_blank">
                                        Cetak Struk
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection

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
            /* Membuat tabel dapat menggulir secara horizontal */
            -webkit-overflow-scrolling: touch;
            /* Add momentum scrolling for iOS */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0;
            padding: 0;
            table-layout: auto;
        }

        th,
        td {
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

        /* Make table font size smaller on smaller screens */
        @media screen and (max-width: 768px) {

            th,
            td {
                font-size: 14px;
                /* Mengurangi ukuran font untuk layar kecil */
                padding: 10px 12px;
                /* Adjust padding for smaller screen */
            }

            table {
                font-size: 12px;
                /* Reduce font size for better readability */
            }
        }

        /* Mobile Responsiveness Improvements */
        @media screen and (max-width: 480px) {

            /* Container and General Layout */
            .container {
                width: 100%;
                padding: 10px;
                box-sizing: border-box;
                touch-action: manipulation;
            }

            /* Table Container Responsive */
            .table-container {
                width: 100%;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
                border-radius: 8px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            }

            table {
                width: 100%;
                min-width: 300px;
                border-collapse: separate;
                border-spacing: 0;
            }

            /* Advanced Grid Layout for Small Screens */
            @supports (display: grid) {

                table,
                thead,
                tbody,
                th,
                td,
                tr {
                    display: block;
                }

                /* Hide original header */
                thead tr {
                    position: absolute;
                    top: -9999px;
                    left: -9999px;
                }

                /* Grid Layout for Table Rows */
                tr {
                    display: grid;
                    grid-template-columns: 1fr 1fr;
                    /* Make two-column grid layout */
                    grid-gap: 10px;
                    /* Reduce gap for small screens */
                    border: 1px solid #e0e0e0;
                    margin-bottom: 15px;
                    padding: 10px;
                    /* Increase padding for readability */
                    background-color: #f9f9f9;
                    border-radius: 8px;
                    transition: background-color 0.3s ease;
                }

                td {
                    text-align: right;
                    border: none;
                    position: relative;
                    padding-left: 50%;
                    /* Add space for labels */
                    line-height: 1.6;
                    word-wrap: break-word;
                    /* Ensure long words don't overflow */
                }

                /* Custom Label for Each Cell */
                td::before {
                    content: attr(data-label);
                    position: absolute;
                    left: 10px;
                    top: 10px;
                    font-weight: bold;
                    color: #333;
                    text-align: left;
                    text-transform: uppercase;
                    /* Make labels clearer */
                }
            }

            /* Interactive States */
            td:active,
            tr:active {
                background-color: #f1f1f1;
                transform: scale(0.99);
                transition: all 0.3s ease;
            }

            /* Smooth Scrolling for Small Screens */
            body {
                -webkit-overflow-scrolling: touch;
                scroll-behavior: smooth;
            }
        }

        /* Ultra Small Screen Optimization */
        @media screen and (max-width: 320px) {
            .container {
                padding: 5px;
            }

            h2 {
                font-size: 16px;
                /* Reduce heading size */
                margin-bottom: 8px;
                text-align: center;
                /* Center align title */
            }

            th,
            td {
                font-size: 12px;
                /* Increase font size slightly for better readability */
                padding: 8px;
                /* Increase padding to avoid text overlap */
            }

            /* Adjust text for readability on very small screens */
            td::before {
                font-size: 12px;
                /* Smaller labels */
            }

            /* Additional Micro-Optimization */
            * {
                max-width: 100%;
                overflow-x: hidden;
            }
        }

        /* Accessibility and Performance Enhancements */
        @media (prefers-reduced-motion: reduce) {
            * {
                transition: none !important;
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
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection

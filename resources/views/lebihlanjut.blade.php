<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bengkel Makmur | Layanan dan Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #3b82f6;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #2563eb;
        }
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f9fafb;
        }
        .gradient-header {
            background: linear-gradient(135deg, #0047AB, #3975c9);
        }
        .service-icon {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .service-icon:hover {
            transform: scale(1.1);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }
        .btn-primary {
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #002d60;
            transform: scale(1.05);
        }
    </style>
</head>
<body class="antialiased text-gray-800">
    <!-- Header -->
    <header class="gradient-header text-white py-16 text-center">
        <div class="container mx-auto px-6">
            <h1 class="text-5xl font-extrabold mb-4">Bengkel Makmur</h1>
            <p class="text-xl opacity-90 max-w-xl mx-auto">
                Ahli dalam perawatan kendaraan, siap membantu menjaga performa kendaraan Anda.
            </p>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-12">
        <!-- Sejarah Section -->
        <section id="sejarah" class="mb-16">
            <div class="bg-white p-8 rounded-lg shadow-md">
                <h2 class="text-4xl font-bold text-blue-800 mb-4">Sejarah Bengkel Makmur</h2>
                <p class="text-lg leading-relaxed mb-4">
                    Bengkel Makmur didirikan pada tahun 2018 sebagai bengkel kecil yang berfokus pada perawatan dasar. Kini, kami menjadi pusat layanan kendaraan terpercaya dengan berbagai layanan modern.
                </p>
                <p class="text-lg leading-relaxed">
                    Dengan terus mengikuti perkembangan teknologi otomotif, kami berkomitmen untuk memberikan layanan terbaik bagi pelanggan, memastikan kendaraan Anda tetap dalam kondisi optimal.
                </p>
            </div>
        </section>

        <!-- Layanan Section -->
        <section id="layanan" class="mb-16">
            <h2 class="text-4xl font-bold text-blue-800 mb-8">Layanan Kami</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white p-8 rounded-lg shadow-md service-icon flex flex-col items-center text-center">
                    <svg class="w-16 h-16 text-blue-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3zM19.742 13c.543 1.493.742 3.09.742 4.5 0 1.41-.199 3.007-.742 4.5H4.258C3.715 20.493 3.516 18.897 3.516 17.5c0-1.41.199-3.007.742-4.5H19.742z"></path>
                    </svg>
                    <p>Servis rutin dan perawatan berkala</p>
                </div>
                <div class="bg-white p-8 rounded-lg shadow-md service-icon flex flex-col items-center text-center">
                    <svg class="w-16 h-16 text-blue-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 15.75h.5a.75.75 0 01.75.75v.5m0 2.5v.5a.75.75 0 01-.75.75h-.5m-2.5-.75h-.5a.75.75 0 01-.75-.75v-.5m0-2.5v-.5a.75.75 0 01.75-.75h.5"></path>
                    </svg>
                    <p>Perbaikan mesin dan transmisi</p>
                </div>
                <div class="bg-white p-8 rounded-lg shadow-md service-icon flex flex-col items-center text-center">
                    <svg class="w-16 h-16 text-blue-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18"></path>
                    </svg>
                    <p>Penggantian suku cadang asli</p>
                </div>
                <div class="bg-white p-8 rounded-lg shadow-md service-icon flex flex-col items-center text-center">
                    <svg class="w-16 h-16 text-blue-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 9.172a4 4 0 10-5.656 5.656l1.414 1.414M11 11v4"></path>
                    </svg>
                    <p>Pemeriksaan rem dan suspensi</p>
                </div>
            </div>
        </section>

        <!-- Cara Booking Section -->
        <section id="cara-booking" class="mb-16">
            <div class="bg-white p-8 rounded-lg shadow-md flex flex-col md:flex-row items-center justify-between">
                <div class="mb-8 md:mb-0 md:mr-6">
                    <h2 class="text-4xl font-bold text-blue-800 mb-4">Cara Booking</h2>
                    <ol class="list-decimal list-inside space-y-2 text-lg">
                        <li>Kunjungi website resmi kami di <a href="{{ route('login') }}" target="_blank" class="text-blue-600 hover:underline">www.bengkelmakmur.co.id</a>.</li>
                        <li>Pilih menu <strong>Booking Servis</strong>.</li>
                        <li>Isi formulir pemesanan dengan lengkap.</li>
                        <li>Pilih jadwal yang tersedia.</li>
                        <li>Konfirmasi pemesanan.</li>
                    </ol>
                </div>
                <a href="{{ route('login') }}" target="_blank" class="btn-primary bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-lg shadow-lg">
                    Pesan Sekarang
                </a>
            </div>
        </section>
    </main>
</body>
</html>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bengkel Motor Express</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <header class="bg-blue-600 text-white">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="font-bold text-xl">Bengkel Motor Express</div>
            <div>
                <a href="{{ route('login') }}" class="bg-white text-blue-600 px-4 py-2 rounded-lg hover:bg-blue-100">Login</a>
                <a href="{{ route('register') }}" class="ml-4 border border-white px-4 py-2 rounded-lg hover:bg-blue-700">Daftar</a>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="bg-blue-600 text-white py-20">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-4xl font-bold mb-4">Servis Kendaraan Anda dengan Mudah</h1>
            <p class="text-xl mb-8">Booking online, tidak perlu antri, hemat waktu Anda</p>
            <a href="{{ route('register') }}" class="bg-white text-blue-600 px-8 py-3 rounded-lg text-lg font-semibold hover:bg-blue-100">
                Mulai Sekarang
            </a>
        </div>
    </section>

    <!-- Features -->
    <section class="py-20">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="bg-blue-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Booking Online</h3>
                    <p class="text-gray-600">Pesan jadwal servis dari mana saja dan kapan saja</p>
                </div>
                <!-- Add more features -->
            </div>
        </div>
    </section>
</body>
</html>

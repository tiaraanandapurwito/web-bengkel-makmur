<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bengkel Makmur</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
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

    section.bg-gradient-to-r {
    background: linear-gradient(to right, rgba(72, 101, 128, 0.8), rgba(51, 86, 151, 0.8)),
        url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS_FdIdOwQdfaAY1dIGsQmFDqqLYWb2aNIIKw&s');
    background-size: cover;
    background-position: center;
    width: 100%;
    padding-bottom: 255px;
    color: #fff;
}
</style>
    @stack('style')
</head>

<body class="font-sans">
    <!-- Header with functional navbar -->
    <header class="bg-blue-600 text-white fixed w-full z-50">
        <nav class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <div class="flex items-center">
                    <i class="fas fa-tools text-2xl mr-2"></i>
                    <a href="#" class="font-bold text-xl">Bengkel Makmur</a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <div class="space-x-6">
                        <a href="#beranda" class="hover:text-gray-200 transition duration-300">Beranda</a>
                        <a href="#layanan" class="hover:text-gray-200 transition duration-300">Layanan</a>
                        <a href="#tentang" class="hover:text-gray-200 transition duration-300">Tentang</a>
                        <a href="#testimoni" class="hover:text-gray-200 transition duration-300">Testimoni</a>
                        <a href="#kontak" class="hover:text-gray-200 transition duration-300">Kontak</a>
                    </div>
                    <div class="hidden md:flex space-x-4">
                        <!-- Update these links to use the correct Laravel routes -->
                        <a href="{{ route('login') }}"
                            class="bg-white text-blue-600 px-4 py-2 rounded-lg hover:bg-gray-100 transition duration-300">Login</a>
                        <a href="{{ route('register') }}"
                            class="border border-white px-4 py-2 rounded-lg hover:bg-gray   -700 transition duration-300">Daftar</a>
                    </div>
                </div>

                <!-- Mobile menu button -->
                <button id="mobile-menu-button" class="md:hidden focus:outline-none">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="md:hidden block pt-4">
                <!-- Ganti 'hidden' menjadi 'block' untuk menampilkan di perangkat kecil -->
                <div class="flex flex-col space-y-3">
                    <a href="#beranda" class="hover:bg-blue-700 px-4 py-2 rounded transition duration-300">Beranda</a>
                    <a href="#layanan" class="hover:bg-blue-700 px-4 py-2 rounded transition duration-300">Layanan</a>
                    <a href="#tentang" class="hover:bg-blue-700 px-4 py-2 rounded transition duration-300">Tentang</a>
                    <a href="#testimoni"
                        class="hover:bg-blue-700 px-4 py-2 rounded transition duration-300">Testimoni</a>
                    <a href="#kontak" class="hover:bg-blue-700 px-4 py-2 rounded transition duration-300">Kontak</a>
                    <hr class="border-blue-400">
                    <a href="{{ route('login') }}"
                        class="flex items-center hover:bg-blue-700 px-4 py-2 rounded transition duration-300">
                        <i class="fas fa-sign-in-alt mr-2"></i>Login
                    </a>
                    <a href="{{ route('register') }}"
                        class="flex items-center hover:bg-blue-700 px-4 py-2 rounded transition duration-300">
                        <i class="fas fa-user-plus mr-2"></i>Register
                    </a>
                </div>
            </div>
        </nav>
    </header>
    <!-- Hero Section -->
    <section id="hero" class="bg-gradient-to-r from-blue-600 to-blue-800 text-white pt-32 pb-20">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 text-center md:text-left">
                    <h1 class="text-4xl md:text-5xl font-bold mb-6">Servis Motor Lebih Mudah dan Terpercaya</h1>
                    <p class="text-xl mb-8">Nikmati kemudahan booking online dan layanan bengkel profesional dengan
                        teknisi berpengalaman</p>
                    <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
                        <a href="{{ route('login') }}"
                            class="bg-white text-blue-600 px-8 py-3 rounded-lg text-lg font-semibold hover:bg-blue-100 transition duration-300">
                            Booking Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section id="layanan" class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12">Keunggulan Kami</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition duration-300">
                    <div class="bg-blue-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-calendar-check text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-center">Booking Online</h3>
                    <p class="text-gray-600 text-center">Reservasi jadwal servis dengan mudah melalui aplikasi atau
                        website</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition duration-300">
                    <div class="bg-blue-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user-tie text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-center">Teknisi Profesional</h3>
                    <p class="text-gray-600 text-center">Tim teknisi berpengalaman dan tersertifikasi</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition duration-300">
                    <div class="bg-blue-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-shield-alt text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-center">Garansi Layanan</h3>
                    <p class="text-gray-600 text-center">Jaminan kualitas dengan garansi servis hingga 30 hari</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services -->
    <section id="fitur" class="py-20">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12">Layanan Kami</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition duration-300">
                    <div class="text-blue-600 mb-4">
                        <i class="fas fa-oil-can text-4xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Servis Rutin</h3>
                    <p class="text-gray-600 text-sm">Perawatan berkala untuk performa optimal motor Anda</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition duration-300">
                    <div class="text-blue-600 mb-4">
                        <i class="fas fa-cog text-4xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Perbaikan Mesin</h3>
                    <p class="text-gray-600 text-sm">Mengatasi masalah mesin dengan diagnosis akurat</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition duration-300">
                    <div class="text-blue-600 mb-4">
                        <i class="fas fa-spray-can text-4xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Cat & Body</h3>
                    <p class="text-gray-600 text-sm">Perbaikan dan pengecatan body motor profesional</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition duration-300">
                    <div class="text-blue-600 mb-4">
                        <i class="fas fa-bolt text-4xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Sistem Kelistrikan</h3>
                    <p class="text-gray-600 text-sm">Perbaikan dan perawatan sistem kelistrikan motor</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section id="testimoni" class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12">Apa Kata Mereka</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <div class="flex items-center mb-4">
                        <img src="/api/placeholder/50/50" alt="Customer" class="rounded-full w-12 h-12">
                        <div class="ml-4">
                            <h4 class="font-semibold">Budi Santoso</h4>
                            <div class="text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600">"Pelayanan sangat professional dan cepat. Booking online memudahkan saya
                        yang sibuk bekerja."</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <div class="flex items-center mb-4">
                        <img src="/api/placeholder/50/50" alt="Customer" class="rounded-full w-12 h-12">
                        <div class="ml-4">
                            <h4 class="font-semibold">Ani Wijaya</h4>
                            <div class="text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600">"Teknisi sangat ramah dan menjelaskan dengan detail setiap perbaikan yang
                        dilakukan."</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <div class="flex items-center mb-4">
                        <img src="/api/placeholder/50/50" alt="Customer" class="rounded-full w-12 h-12">
                        <div class="ml-4">
                            <h4 class="font-semibold">Rudi Hermawan</h4>
                            <div class="text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600">"Hasil pengerjaan sangat memuaskan dan sesuai dengan estimasi waktu yang
                        dijanjikan."</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="bg-blue-600 text-white py-16">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-4">Siap untuk servis motor Anda?</h2>
            <p class="text-xl mb-8">Dapatkan pengalaman servis motor terbaik dengan teknisi profesional kami</p>
            <a href="#booking"
                class="bg-white text-blue-600 px-8 py-3 rounded-lg text-lg font-semibold hover:bg-blue-100 transition duration-300">
                Booking Sekarang
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-semibold mb-4">Bengkel Motor Express</h3>
                    <p class="text-gray-400">Solusi perawatan motor terpercaya dengan teknologi modern dan layanan
                        profesional.</p>
                </div>
                <div>
                    <h3 class="text-xl font-semibold mb-4">Layanan</h3>
                    <ul class="text-gray-400">
                        <li class="mb-2">Servis Rutin</li>
                        <li class="mb-2">Perbaikan Mesin</li>
                        <li class="mb-2">Cat & Body</li>
                        <li class="mb-2">Sistem Kelistrikan</li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-semibold mb-4">Kontak</h3>
                    <ul class="text-gray-400">
                        <li class="mb-2"><i class="fas fa-phone mr-2"></i> (021) 1234-5678</li>
                        <li class="mb-2"><i class="fas fa-envelope mr-2"></i> info@bengkelmotor.com</li>
                        <li class="mb-2"><i class="fas fa-map-marker-alt mr-2"></i> Jl. Raya Motor No. 123, Jakarta
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-semibold mb-4">Jam Operasional</h3>
                    <ul class="text-gray-400">
                        <li class="mb-2">Senin - Jumat: 08:00 - 17:00</li>
                        <li class="mb-2">Sabtu: 08:00 - 15:00</li>
                        <li class="mb-2">Minggu: 09:00 - 13:00</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="text-gray-400 text-sm">
                        © 2024 Bengkel Motor Express. All rights reserved.
                    </div>
                    <div class="flex space-x-4 mt-4 md:mt-0">
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                            <i class="fab fa-facebook-f text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                            <i class="fab fa-whatsapp text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                            <i class="fab fa-youtube text-xl"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/6281234567890"
        class="fixed bottom-8 right-8 bg-green-500 text-white p-4 rounded-full shadow-lg hover:bg-green-600 transition duration-300">
        <i class="fab fa-whatsapp text-2xl"></i>
    </a>

    <!-- Booking Modal (Hidden by default) -->
    <div id="bookingModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white rounded-lg shadow-xl w-full max-w-md">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-xl font-semibold">Booking Servis</h3>
                        <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <form>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-gray-700 mb-2">Nama Lengkap</label>
                                <input type="text"
                                    class="w-full p-2 border rounded-lg focus:outline-none focus:border-blue-500">
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2">Nomor WhatsApp</label>
                                <input type="tel"
                                    class="w-full p-2 border rounded-lg focus:outline-none focus:border-blue-500">
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2">Jenis Motor</label>
                                <input type="text"
                                    class="w-full p-2 border rounded-lg focus:outline-none focus:border-blue-500">
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2">Tanggal Servis</label>
                                <input type="date"
                                    class="w-full p-2 border rounded-lg focus:outline-none focus:border-blue-500">
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2">Layanan</label>
                                <select class="w-full p-2 border rounded-lg focus:outline-none focus:border-blue-500">
                                    <option value="">Pilih Layanan</option>
                                    <option value="servis-rutin">Servis Rutin</option>
                                    <option value="perbaikan-mesin">Perbaikan Mesin</option>
                                    <option value="cat-body">Cat & Body</option>
                                    <option value="kelistrikan">Sistem Kelistrikan</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2">Keluhan</label>
                                <textarea class="w-full p-2 border rounded-lg focus:outline-none focus:border-blue-500" rows="3"></textarea>
                            </div>
                        </div>
                        <button type="submit"
                            class="w-full bg-blue-600 text-white py-2 rounded-lg mt-6 hover:bg-blue-700 transition duration-300">
                            Kirim Booking
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Simple JavaScript for Modal -->
    <script>
        function openModal() {
            document.getElementById('bookingModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('bookingModal').classList.add('hidden');
        }

        // Open modal when booking buttons are clicked
        document.querySelectorAll('[href="#booking"]').forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                openModal();
            });
        });
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            // Toggle menu
            mobileMenu.classList.toggle('hidden');
            // Toggle icon
            const icon = mobileMenuButton.querySelector('i');
            if (icon.classList.contains('fa-bars')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            } else {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!mobileMenuButton.contains(e.target) && !mobileMenu.contains(e.target)) {
                mobileMenu.classList.add('hidden');
                const icon = mobileMenuButton.querySelector('i');
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });

        // Smooth scroll for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const href = this.getAttribute('href');

                // Close mobile menu if open
                mobileMenu.classList.add('hidden');
                const icon = mobileMenuButton.querySelector('i');
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');

                // Special handling for modal triggers
                if (href === '#booking') {
                    openModal();
                    return;
                }

                // Smooth scroll to section
                if (href !== '#') {
                    const section = document.querySelector(href);
                    if (section) {
                        section.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                }
            });
        });

        // Handle scroll events for navbar
        window.addEventListener('scroll', () => {
            const header = document.querySelector('header');
            if (window.scrollY > 50) {
                header.classList.add('shadow-lg');
            } else {
                header.classList.remove('shadow-lg');
            }
        });
    </script>
</body>
</html>

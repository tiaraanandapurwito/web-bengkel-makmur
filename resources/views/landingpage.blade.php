<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bengkel Makmur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}"> --}}
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

        :root {
            --primary-blue: #1a4b8d;
            --secondary-blue: #2c7bd9;
            --light-blue: #e6f2ff;
            --accent-color: #f39c12;
            --text-color: #333;
        }

        * {
            transition: all 0.3s ease;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--text-color);
            background-color: #f4f7f9;
            line-height: 1.6;
        }

        .navbar {
            background-color: rgba(26, 75, 141, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar .navbar-brand {
            text-decoration: none !important;
        }

        .navbar-nav .nav-link {
            text-decoration: none !important;
            color: white;
        }

        .navbar-nav .nav-link:hover {
            color: #afafac;
        }

        .ms-3 .btn {
            text-decoration: none !important;
            /* Hilangkan garis bawah pada tombol Login dan Daftar */
        }

        .ms-3 .btn:hover {
            text-decoration: none;
            /* Opsional: tetap tanpa garis saat hover */
        }


        .hero {
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
            color: white;
            padding: 150px 0;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg,
                    rgba(26, 75, 141, 0.9),
                    rgba(44, 123, 217, 0.9));
            clip-path: polygon(0 0, 100% 0, 100% 85%, 0 100%);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
        }

        .hero-title {
            font-weight: 700;
            letter-spacing: -1px;
            text-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .hero-subtitle {
            font-weight: 300;
            opacity: 0.9;
        }

        .service-card {
            transition: all 0.3s ease;
            border: none;
            background-color: white;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            border-radius: 15px;
            overflow: hidden;
        }

        .service-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        .service-card .card-icon {
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
            color: white;
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }

        .btn-primary-custom {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
            color: white;
            transition: all 0.3s ease;
        }

        .btn-primary-custom:hover {
            background-color: var(--primary-blue);
            border-color: var(--primary-blue);
            transform: translateY(-3px);
        }

        .features {
            background-color: var(--light-blue);
        }

        @keyframes smoothSlideForward {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        @keyframes smoothSlideBackward {
            0% {
                transform: translateX(-50%);
            }

            100% {
                transform: translateX(0);
            }
        }

        .media-partner-section {
            position: relative;
            overflow: hidden;
            padding: 4rem 0;
            padding-top: 6rem;
            text-align: center;
            background: white;
        }

        .media-partner-section h2 {
            font-size: 2.5rem;
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            color: black;
            margin-bottom: 2rem;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }

        .partner-logos {
            display: flex;
            overflow: hidden;
            position: relative;
        }

        .partner-logo-track {
            display: flex;
            align-items: center;
            animation:
                smoothSlideForward 10s linear forwards,
                smoothSlideBackward 10s linear 10s reverse forwards;
            animation-iteration-count: infinite;
            width: 200%;
        }

        .partner-logo {
            flex: 0 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 200px;
            height: 100px;
            margin: 0 30px;
            opacity: 1;
            transition: all 0.5s ease;
        }

        .partner-logo img {
            max-width: 350px;
            max-height: 100px;
            object-fit: contain;
            filter: grayscale(20%) brightness(1.2);
            transition: all 0.3s ease;
        }

        .partner-logo img:hover {
            filter: grayscale(0%) brightness(1.3);
        }

        /* Smooth Transition Between Animations */
        .partner-logo-track::after {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to right,
                    rgba(255, 255, 255, 1) 0%,
                    rgba(255, 255, 255, 0) 5%,
                    rgba(255, 255, 255, 0) 95%,
                    rgba(255, 255, 255, 1) 100%);
            pointer-events: none;
            z-index: 1;
        }

        /* Responsive Adjustments */
        @media (max-width: 1024px) {
            .partner-logo {
                width: 150px;
                margin: 0 20px;
            }

            .partner-logo img {
                max-width: 120px;
                max-height: 60px;
            }
        }

        @media (max-width: 768px) {
            .partner-logo {
                width: 120px;
                margin: 0 15px;
            }

            .partner-logo img {
                max-width: 90px;
                max-height: 50px;
            }
        }

        @media (max-width: 480px) {
            .partner-logo {
                width: 100px;
                margin: 0 10px;
            }

            .partner-logo img {
                max-width: 80px;
                max-height: 40px;
            }
        }

        .footer {
            background-color: var(--primary-blue);
            color: white;
            padding: 60px 0;
        }

        @media (max-width: 768px) {
            .hero {
                padding: 100px 0;
            }

            .hero-title {
                font-size: 2.5rem;
            }

            .hero-subtitle {
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-tools me-2"></i> Bengkel Makmur
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#beranda">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#layanan">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
                </ul>
                <div class="ms-3">
                    <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-light text-primary">Daftar</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="beranda" class="hero">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 hero-content">
                    <h1 class="display-4 mb-4 hero-title text-white">
                        Profesional Perawatan Kendaraan Anda
                    </h1>
                    <p class="lead mb-5 hero-subtitle">
                        Solusi handal untuk servis dan perbaikan kendaraan dengan teknologi terkini dan keahlian
                        profesional
                    </p>
                    <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg"
                        style="text-decoration: none !important;">
                        <i class="fas fa-tools me-2"></i> Booking Sekarang
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Layanan Section -->
    <section id="layanan" class="py-5 features">
        <div class="container text-center">
            <h2 class="fw-bold mb-5">Layanan Kami</h2>
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="card service-card p-4 text-center">
                        <div class="card-icon mb-3">
                            <i class="fas fa-oil-can fa-2x"></i>
                        </div>
                        <h5 class="fw-semibold">Servis Rutin</h5>
                        <p class="text-muted">Perawatan berkala untuk performa optimal</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card service-card p-4 text-center">
                        <div class="card-icon mb-3">
                            <i class="fas fa-cog fa-2x"></i>
                        </div>
                        <h5 class="fw-semibold">Perbaikan Mesin</h5>
                        <p class="text-muted">Diagnosis akurat dan perbaikan profesional</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card service-card p-4 text-center">
                        <div class="card-icon mb-3">
                            <i class="fas fa-spray-can fa-2x"></i>
                        </div>
                        <h5 class="fw-semibold">Cat & Body</h5>
                        <p class="text-muted">Perbaikan dan pengecatan profesional</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card service-card p-4 text-center">
                        <div class="card-icon mb-3">
                            <i class="fas fa-bolt fa-2x"></i>
                        </div>
                        <h5 class="fw-semibold">Sistem Kelistrikan</h5>
                        <p class="text-muted">Perawatan sistem kelistrikan kendaraan</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tentang Section -->
    <section id="tentang" class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="fw-bold mb-4">Tentang Bengkel Makmur</h2>
                    <p class="lead text-muted">
                        Kami adalah bengkel profesional dengan teknisi berpengalaman yang siap memberikan layanan
                        terbaik untuk kendaraan Anda.
                    </p>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Teknisi Berpengalaman</li>
                        <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Peralatan Modern</li>
                        <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Garansi Layanan</li>
                    </ul>
                    <a href="{{ route('lebihlanjut') }}" class="btn btn-primary mt-3"
                        style="text-decoration: none !important;">Pelajari Lebih Lanjut</a>
                </div>
                <div class="col-lg-6">
                    <div class="bg-light p-4 rounded shadow-sm">
                        <h5 class="mb-3">Komitmen Kami</h5>
                        <p class="text-muted">
                            Memberikan layanan berkualitas tinggi, mengutamakan kepuasan pelanggan, dan menjunjung
                            tinggi profesionalisme dalam setiap pekerjaan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Media Partners Section Start -->
    <section class="media-partner-section">
        <div class="container-fluid">
            <div class="text-center mb-5">
                <h2 class="display-6 mb-4">Our Trusted Partners</h2>
            </div>

            <div class="partner-logos">
                <div class="partner-logo-track">
                    <!-- Logos here, for example: -->
                    <div class="partner-logo">
                        <img src="{{ asset('assets/img/yamaha.jfif') }}" alt="Yamaha">
                    </div>
                    <div class="partner-logo">
                        <img src="{{ asset('assets/img/toyota.jpeg') }}" alt="Toyota">
                    </div>
                    <div class="partner-logo">
                        <img src="{{ asset('assets/img/Logo-SMK-Telkom-01.png') }}" alt="SMK TELKOM">
                    </div>
                    <div class="partner-logo">
                        <img src="{{ asset('assets/img/fuso.png') }}" alt="Fuso">
                    </div>
                    <div class="partner-logo">
                        <img src="{{ asset('assets/img/honda.png') }}" alt="Honda">
                    </div>
                    <div class="partner-logo">
                        <img src="{{ asset('assets/img/repsol.png') }}" alt="Repsol">
                    </div>
                    <div class="partner-logo">
                        <img src="{{ asset('assets/img/suzuki.png') }}" alt="Suzuki">
                    </div>

                    <!-- Repeated logos for smooth scroll loop -->
                    <div class="partner-logo">
                        <img src="{{ asset('assets/img/yamaha.jfif') }}" alt="Yamaha">
                    </div>
                    <div class="partner-logo">
                        <img src="{{ asset('assets/img/toyota.jpeg') }}" alt="Toyota">
                    </div>
                    <div class="partner-logo">
                        <img src="{{ asset('assets/img/Logo-SMK-Telkom-01.png') }}" alt="SMK TELKOM">
                    </div>
                    <div class="partner-logo">
                        <img src="{{ asset('assets/img/fuso.png') }}" alt="Fuso">
                    </div>
                    <div class="partner-logo">
                        <img src="{{ asset('assets/img/honda.png') }}" alt="Honda">
                    </div>
                    <div class="partner-logo">
                        <img src="{{ asset('assets/img/repsol.png') }}" alt="Repsol">
                    </div>
                    <div class="partner-logo">
                        <img src="{{ asset('assets/img/suzuki.png') }}" alt="Suzuki">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Media Partners Section End -->

    <!-- Footer -->
    <footer id="kontak" class="footer py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5 class="fw-bold mb-3">Bengkel Makmur</h5>
                    <p>Solusi profesional untuk perawatan dan perbaikan kendaraan Anda</p>
                </div>
                <div class="col-md-4">
                    <h5 class="fw-bold mb-3">Kontak Kami</h5>
                    <p>
                        <a href="https://www.google.com/maps/place/SMK+Telkom+Pekanbaru/@0.4844817,101.3639169,17z/data=!3m1!4b1!4m6!3m5!1s0x31d5a9245e855629:0x875ac3c27ed550d3!8m2!3d0.4844763!4d101.3664918!16s%2Fg%2F1pzt_wjjm?entry=ttu&g_ep=EgoyMDI0MTExOC4wIKXMDSoJLDEwMjExMjMzSAFQAw%3D%3D"
                            target="_blank" class="text-decoration-none"
                            style="color: white; transition: color 0.2s;">
                            <i class="fas fa-map-marker-alt me-2"></i> Jl. Raya Esemka No.5, Pekanbaru
                        </a>
                        <br>
                        <style>
                            a:hover {
                                color: #00ffcc;
                                /* Warna saat hover */
                                text-decoration: underline;
                                /* Menambahkan garis bawah saat hover */
                            }
                        </style>
                        <a href="https://wa.me/6285363540354" class="text-white text-decoration-none"
                            target="_blank">
                            <i class="fab fa-whatsapp me-2"></i> +6285363540354
                        </a><br>
                        <i class="fas fa-envelope me-2"></i> bengkelmakmurpku@gmail.com
                    </p>
                </div>
                <div class="col-md-4">
                    <h5 class="fw-bold mb-3">Jam Operasional</h5>
                    <ul class="list-unstyled">
                        <li>Senin - Jumat: 08:00 - 20:00</li>
                        <li>Sabtu: 08:00 - 17:00</li>
                        <li>Minggu: 09:00 - 15:00</li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

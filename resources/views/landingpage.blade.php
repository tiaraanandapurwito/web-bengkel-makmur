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
            padding: 160px 0;
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

        .footer {
            background-color: var(--primary-blue);
            color: white;
            padding: 60px 0;
        }

        /* Mobile Responsiveness Stylesheet */

        /* CSS Variables for Mobile Scaling */
        :root {
            --mobile-font-scale: 0.9;
            --mobile-spacing-scale: 0.8;
        }

        /* Global Mobile Media Query */
        @media (max-width: 480px) {

            /* Typography and Body Adjustments */
            body {
                font-size: calc(14px * var(--mobile-font-scale));
                line-height: 1.5;
                overflow-x: hidden;
                -webkit-overflow-scrolling: touch;
                scroll-behavior: auto !important;
            }

            /* Navbar Mobile Styling */
            .navbar {
                background-color: rgba(26, 75, 141, 0.98) !important;
                padding: 10px 0;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            }

            .navbar-brand {
                font-size: 1.3rem;
                display: flex;
                align-items: center;
            }

            .navbar-nav {
                margin-top: 15px;
                text-align: center;
                width: 100%;
            }

            .navbar-nav .nav-item {
                margin-bottom: 12px;
            }

            .ms-3 {
                display: flex;
                flex-direction: column;
                align-items: center;
                width: 100%;
                margin-top: 15px !important;
            }

            .ms-3 .btn {
                width: 80%;
                margin-bottom: 10px;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            /* Hero Section Mobile Design */
            .hero {
                position: relative;
                padding: 200px 15px 80px !important;
                text-align: center;
                overflow: hidden;
            }

            .hero::before {
                clip-path: polygon(0 0, 100% 0, 100% 90%, 0 100%);
            }

            .hero-title {
                font-size: 2.2rem !important;
                line-height: 1.2;
                margin-bottom: 15px;
                text-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
            }

            .hero-subtitle {
                font-size: 1rem !important;
                opacity: 0.9;
                margin-bottom: 25px;
            }

            .hero .btn {
                padding: 12px 20px;
                font-size: 1rem;
                display: inline-flex;
                align-items: center;
                justify-content: center;
            }

            /* Services Section Mobile Layout */
            #layanan {
                padding: 40px 15px !important;
            }

            #layanan .row {
                display: flex;
                flex-direction: column;
                gap: 20px;
            }

            .service-card {
                transform: scale(0.95);
                transition: all 0.3s ease;
            }

            .service-card:hover {
                transform: scale(1) translateY(-10px);
            }

            .service-card .card-icon {
                width: 65px;
                height: 65px;
                margin-bottom: 15px;
            }

            .service-card h5 {
                font-size: 1.1rem;
                margin-bottom: 10px;
            }

            .service-card p {
                font-size: 0.9rem;
            }

            /* About Section Mobile Optimization */
            #tentang {
                padding: 50px 15px !important;
            }

            #tentang .row {
                flex-direction: column-reverse;
            }

            #tentang h2 {
                font-size: 1.8rem;
                margin-bottom: 15px;
                margin-top: 20px
            }

            #tentang .lead {
                font-size: 1rem;
            }

            /* Footer Mobile Design */
            .footer {
                padding: 40px 15px !important;
            }

            .footer .row {
                display: flex;
                flex-direction: column;
                text-align: center;
            }

            .footer h5 {
                font-size: 1.2rem;
                margin-bottom: 15px;
            }

            .footer p,
            .footer ul {
                font-size: 0.95rem;
            }

            /* Performance and Accessibility Enhancements */
            * {
                touch-action: manipulation;
                -webkit-tap-highlight-color: transparent;
            }

            img {
                max-width: 100%;
                height: auto;
            }
        }

        /* Ultra Small Mobile Devices */
        @media (max-width: 320px) {
            .hero-title {
                font-size: 1.8rem !important;
            }

            .hero-subtitle {
                font-size: 0.9rem !important;
            }
        }

        /* Landscape Orientation Support */
        @media screen and (max-width: 480px) and (orientation: landscape) {
            .hero {
                padding: 60px 15px !important;
            }

            #layanan,
            #tentang {
                padding: 30px 15px !important;
            }
        }

        @media (max-width: 992px) {

            /* Navbar Adjustments */
            .navbar-nav {
                margin-top: 15px;
                text-align: center;
            }

            .navbar-nav .nav-item {
                margin-bottom: 10px;
            }

            .ms-3 {
                display: flex;
                flex-direction: column;
                align-items: center;
                margin-top: 15px !important;
            }

            .ms-3 .btn {
                margin-bottom: 10px;
                width: 200px;
            }

            /* Hero Section Responsiveness */
            .hero {
                padding: 100px 0 80px;
                text-align: center;
            }

            .hero-title {
                font-size: 2.8rem;
            }

            .hero-subtitle {
                font-size: 1.1rem;
            }

            /* Services Section */
            #layanan .row {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
            }

            #layanan .col-md-3 {
                flex: 0 0 auto;
                width: 49%;
                margin-bottom: 20px;
            }

            /* About Section */
            #tentang .row {
                flex-direction: column;
            }

            #tentang .col-lg-6 {
                width: 100%;
                margin-bottom: 20px;
            }

            /* Footer Responsiveness */
            .footer .row {
                text-align: center;
            }

            .footer .col-md-4 {
                width: 100%;
                margin-bottom: 20px;
            }
        }

        /* Ultra-Small Devices */
        @media (max-width: 576px) {
            .hero-title {
                font-size: 2.2rem;
            }

            .hero-subtitle {
                font-size: 0.95rem;
            }

            #layanan .col-md-3 {
                width: 100%;
            }

            .service-card {
                padding: 20px !important;
            }
        }

        /* Tablet Devices */
        @media (min-width: 768px) and (max-width: 992px) {
            #layanan .col-md-3 {
                width: 45%;
            }
        }

        /* Print Styles */
        @media print {
            body {
                background: white;
            }

            .navbar,
            .footer {
                display: none;
            }

            .hero {
                padding: 20px 0;
                background: none;
                color: black;
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

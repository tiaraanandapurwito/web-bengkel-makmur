<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bengkel Telkom - Solusi Perawatan Kendaraan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #1a4b8d;
            --secondary-blue: #2c7bd9;
            --light-blue: #e6f2ff;
            --accent-color: #f39c12;
        }

        body {
            font-family: 'Poppins', 'Arial', sans-serif;
            color: var(--primary-blue);
            background-color: #f4f7f9;
            line-height: 1.6;
        }

        .navbar {
            background-color: rgba(26, 75, 141, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .hero {
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
            color: white;
            padding: 120px 0;
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
            background: url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" opacity="0.1"%3E%3Cpattern id="pattern" width="100" height="100" patternUnits="userSpaceOnUse"%3E%3Cpath d="M0 0 L100 0 L0 100 Z" fill="%23ffffff"%3E%3C/path%3E%3Cpath d="M100 0 L0 100 L100 100 Z" fill="%23ffffff"%3E%3C/path%3E%3C/pattern%3E%3Crect width="100%" height="100%" fill="url(%23pattern)"/%3E%3C/svg%3E');
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .service-card {
            transition: all 0.3s ease;
            border: none;
            background-color: white;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
            border-radius: 15px;
            overflow: hidden;
        }

        .service-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
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

        .transparent-image {
            background: transparent;
            mix-blend-mode: multiply;
        }

        /* Additional responsive adjustments */
        @media (max-width: 768px) {
            .hero, .footer {
                text-align: center;
            }
            .hero-content {
                margin-bottom: 30px;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-tools me-2"></i> Bengkel Telkom
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
    <section id="beranda" class="hero text-center text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content">
                    <h1 class="display-4 fw-bold mb-4">Servis Kendaraan Profesional</h1>
                    <p class="lead mb-4">Solusi terbaik untuk perawatan dan perbaikan kendaraan Anda</p>
                    <a href="{{ route('login') }}" class="btn btn-primary-custom btn-lg">
                        <i class="fas fa-tools me-2"></i> Booking Sekarang
                    </a>
                </div>
                <div class="col-lg-6 hero-content">
                    <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 600 400' preserveAspectRatio='xMidYMid meet'%3E%3Cstyle%3E.motorcycle{fill:%232c7bd9;fill-opacity:0.5;stroke:%231a4b8d;stroke-width:3;}&lt;/style%3E%3Cpath class='motorcycle' d='M200 250 C250 200, 350 200, 400 250 L450 300 Q400 350, 350 325 L300 275 Q250 250, 200 250 Z'/%3E%3Cpath class='motorcycle' d='M220 270 L180 220 Q150 190, 100 200 L50 230'/&gt;%3C/svg%gt;"
                         alt="Motorcycle Repair"
                         class="img-fluid rounded-4 shadow-lg transparent-image">
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
                        <p class="text-muted">Perawatan sistem kelistrikan motor</p>
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
                    <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 600 400' preserveAspectRatio='xMidYMid meet'%3E%3Cstyle%3E.workshop{fill:%232c7bd9;fill-opacity:0.3;stroke:%231a4b8d;stroke-width:2;}&lt;/style%3E%3Crect x='50' y='50' width='500' height='300' class='workshop' rx='20'/&gt;%3Cpath d='M150 200 L250 200 L250 300 L150 300 Z' fill='%231a4b8d' fill-opacity='0.5'/&gt;%3Cpath d='M350 200 L450 200 L450 300 L350 300 Z' fill='%231a4b8d' fill-opacity='0.5'/&gt;%3C/svg%3E"
                         alt="Bengkel Workshop"
                         class="img-fluid rounded-4 shadow-lg transparent-image">
                </div>
                <div class="col-lg-6 ps-lg-5">
                    <h2 class="fw-bold mb-4">Tentang Bengkel Telkom</h2>
                    <p class="lead text-muted">
                        Kami adalah bengkel profesional dengan teknisi berpengalaman yang siap memberikan layanan terbaik untuk kendaraan Anda.
                    </p>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Teknisi Berpengalaman</li>
                        <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Peralatan Modern</li>
                        <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Garansi Layanan</li>
                    </ul>
                    <a href="#" class="btn btn-primary mt-3">Pelajari Lebih Lanjut</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="kontak" class="footer py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5 class="fw-bold mb-3">Bengkel Telkom</h5>
                    <p>Solusi profesional untuk perawatan dan perbaikan kendaraan Anda</p>
                </div>
                <div class="col-md-4">
                    <h5 class="fw-bold mb-3">Kontak Kami</h5>
                    <p>
                        <i class="fas fa-map-marker-alt me-2"></i> Jl. Esemka No.5, Pekanbaru<br>
                        <i class="fas fa-phone me-2"></i> (021) 1234-5678<br>
                        <i class="fas fa-envelope me-2"></i> info@bengkeltelkom.com
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

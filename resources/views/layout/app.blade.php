<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard Pemesanan Servis Kendaraan')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --accent-color: #4895ef;
            --text-primary: #2b2d42;
            --text-secondary: #8d99ae;
            --bg-light: #f8f9fa;
            --bg-white: #ffffff;
            --sidebar-width: 250px;
            --navbar-height: 70px;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-primary);
            margin-top: var(--navbar-height);
        }

        .navbar {
            background-color: rgb(68, 68, 235);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08);
            padding: 1rem 1.5rem;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
        }

        .navbar-brand {
            font-weight: 600;
            color: white !important;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .navbar-brand i {
            font-size: 1.5rem;
        }

        .nav-link {
            color: white;
            font-weight: 500;
            padding: 0.5rem 1rem !important;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        /* .nav-link:hover {
            color: var(--primary-color) !important;
            background-color: rgba(67, 97, 238, 0.05);
        } */

        .nav-link.active {
            color: rgb(82, 78, 78);
            background-color: rgba(239, 240, 248, 0.1);
        }

        .sidebar {
            background-color: var(--bg-white);
            width: var(--sidebar-width);
            height: calc(100vh - var(--navbar-height));
            position: fixed;
            left: 0;
            top: var(--navbar-height);
            padding: 1.5rem;
            box-shadow: 2px 0 4px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            z-index: 999;
        }

        .sidebar-header {
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .sidebar-user {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--accent-color);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }

        .user-info {
            flex: 1;
        }

        .user-name {
            font-weight: 600;
            color: var(--text-primary);
            margin: 0;
            font-size: 0.95rem;
        }

        .user-role {
            color: var(--text-secondary);
            font-size: 0.8rem;
            margin: 0;
        }

        .nav-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .nav-menu-item {
            margin-bottom: 0.5rem;
        }

        .nav-menu-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
            color: var(--text-primary);
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .nav-menu-link:hover {
            background-color: rgba(67, 97, 238, 0.05);
            color: var(--primary-color);
        }

        .nav-menu-link.active {
            background-color: var(--primary-color);
            color: white;
        }

        .nav-menu-link i {
            font-size: 1.2rem;
            width: 20px;
            text-align: center;
        }

        .main-content {
            margin-left: var(--sidebar-width);
            padding: 2rem;
            min-height: calc(100vh - var(--navbar-height));
            display: flex;
            flex-direction: column;
            max-width: 1200px;
        }

        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
                z-index: 1000;
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
                padding: 1rem;
            }
        }

        .user-dropdown {
            position: relative;
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 0.5rem;
        }

        .dropdown-item {
            padding: 0.5rem 1rem;
            border-radius: 6px;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
        }

        .dropdown-item:hover {
            background-color: rgba(67, 97, 238, 0.05);
            color: var(--primary-color);
        }

        .dropdown-item i {
            font-size: 1rem;
            width: 20px;
            text-align: center;
        }

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
    </style>
    @yield('styles')
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <button class="btn d-lg-none" type="button" onclick="toggleSidebar()">
                <i class="fas fa-bars"></i>
            </button>
            <a class="navbar-brand" href="#">
                <i class="fas fa-tools"></i>
                Bengkel Makmur
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt me-2"></i>Login
                        </a>
                    </li>
                    @else
                    
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    @auth
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-user">
                <div class="user-avatar">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <div class="user-info">
                    <div class="dropdown">
                        <button class="btn p-0 m-0 dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle me-2"></i>{{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li>
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i>Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                    <div class="date-display">
                        {{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                    </div>
                </div>
            </div>
        </div>
        <ul class="nav-menu">
            @if (auth()->user()->isAdmin)
            <li class="nav-menu-item">
                <a href="{{ route('admin.bookings') }}"
                    class="nav-menu-link {{ Request::routeIs('admin.bookings') ? 'active' : '' }}">
                    <i class="fas fa-list-alt"></i> <span>List Pemesanan</span>
                </a>
            </li>
            <li class="nav-menu-item">
                <a href="{{ route('admin.servis') }}"
                    class="nav-menu-link {{ Request::routeIs('admin.servis') ? 'active' : '' }}">
                    <i class="fas fa-tools"></i>
                    <span>Tambah Layanan</span>
                </a>
            </li>
            <li class="nav-menu-item">
                <a href="{{ route('admin.HistoryBooking') }}"
                    class="nav-menu-link {{ request()->routeIs('admin.HistoryBooking') ? 'active' : '' }}">
                    <i class="fas fa-list-alt"></i> <span>History Booking</span>
                </a>
            </li>
            @else
            <li class="nav-menu-item">
                <a href="{{ route('dashboard') }}"
                    class="nav-menu-link {{ Request::routeIs('dashboard') ? 'active' : '' }}">
                    <i class="fas fa-home"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-menu-item">
                <a href="{{ route('historypemesanan') }}"
                    class="nav-menu-link {{ Request::routeIs('historypemesanan') ? 'active' : '' }}">
                    <i class="fas fa-history"></i> <span>History</span>
                </a>
            </li>
            @endif
        </ul>
    </div>
    @endauth

    <div class="main-content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('show');
        }

        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const toggleBtn = document.querySelector('.btn');

            if (window.innerWidth < 992) {
                if (!sidebar.contains(event.target) && !toggleBtn.contains(event.target)) {
                    sidebar.classList.remove('show');
                }
            }
        });
    </script>

    @yield('scripts')
</body>

</html>
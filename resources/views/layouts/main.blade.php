<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>LabAccess - @yield('title', 'Home')</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('img/logo.webp') }}" rel="icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Poppins:wght@400;700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <style>
        /* Reset dan dasar */
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
            font-family: 'Roboto', 'Poppins', sans-serif;
        }

        .main {
            flex: 1;
            padding: 20px;
            margin-top: 80px; /* Ruang untuk header fixed */
            width: 100%;
            background-color: rgba(255, 255, 255, 0.8); /* Default transparan */
            transition: background-color 0.3s ease; /* Transisi halus */
        }

        .footer {
            background-color: #f8f9fa;
            padding: 1rem 0;
        }

        .header {
            background-color: #f8f9fa;
            color: #000;
            padding: 0 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        /* Navbar Styles */
        .navbar-nav .nav-link {
            color: #000;
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #007bff;
        }

        /* Active Link Styles */
        .navbar-nav .nav-link.active {
            font-weight: 700;
            color: #007bff;
            border-bottom: 2px solid #007bff;
        }

        /* Dark mode styles */
        body.dark-mode {
            background-color: #121212;
            color: #ffffff;
        }

        body.dark-mode .header {
            background-color: #1e1e1e;
            color: #ffffff;
            box-shadow: 0 2px 4px rgba(255,255,255,0.1);
        }

        body.dark-mode .navbar-nav .nav-link {
            color: #ffffff;
        }

        body.dark-mode .navbar-nav .nav-link:hover {
            color: #66b2ff;
        }

        body.dark-mode .navbar-nav .nav-link.active {
            color: #66b2ff;
            border-bottom: 2px solid #66b2ff;
        }

        body.dark-mode .footer {
            background-color: #1e1e1e;
            color: #ffffff;
        }

        body.dark-mode .theme-toggle i {
            color: #ffffff;
        }

        body.dark-mode .main {
            background-color: rgba(18, 18, 18, 0.9); /* Transparansi gelap */
        }

        /* Mode Terang (default Bootstrap) */
body.light-mode .table {
    background-color: #ffffff !important; /* Pastikan background putih */
    color: #000000 !important; /* Pastikan teks hitam */
}

body.light-mode .table th, 
body.light-mode .table td {
    background-color: #ffffff !important; /* Background putih untuk th dan td */
    color: #000000 !important; /* Teks hitam untuk th dan td */
    border-color: #dddddd !important; /* Border abu-abu terang */
}

/* Mode Gelap */
body.dark-mode .table {
    background-color: #000000 !important; /* Pastikan background hitam */
    color: #ffffff !important; /* Pastikan teks putih */
}

body.dark-mode .table th, 
body.dark-mode .table td {
    background-color: #1e1e1e !important; /* Background abu-abu gelap */
    color: #ffffff !important; /* Teks putih */
    border-color: #444444 !important; /* Border abu-abu gelap */
}


        /* Default text styling */
        a {
            text-decoration: none;
            color: inherit;
        }

        /* Perbaikan untuk konten anak */
        .main img, .main p, .main h1, .main h2, .main h3, .main h4, .main h5, .main h6 {
            visibility: visible; /* Pastikan elemen terlihat */
            color: inherit; /* Warna mengikuti mode aktif */
        }

        /* Responsive adjustments if needed */
        @media (max-width: 767.98px) {
            .navbar-nav .nav-link {
                padding: 0.5rem 1rem;
            }
        }
    </style>
</head>

<body>
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid d-flex align-items-center">
            <!-- Logo di sebelah kiri -->
            <a href="{{ route('index') }}" class="logo d-flex align-items-center me-auto">
                <img src="{{ asset('img/logo.png') }}" alt="" style="height: 40px; margin-right: 10px;">
                <h1 class="sitename mb-0" id="labaccess-name" style="transition: color 0.3s ease;">LabAccess</h1>
            </a>

            <!-- Navbar Bootstrap -->
            <nav class="navbar navbar-expand-md navbar-light">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="{{ route('index') }}" class="nav-link {{ request()->routeIs('index') ? 'active' : '' }}">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">Tentang</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('informasi') }}" class="nav-link {{ request()->routeIs('informasi') ? 'active' : '' }}">Informasi</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('layanan') }}" class="nav-link {{ request()->routeIs('layanan') ? 'active' : '' }}">Layanan</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('status-peminjaman') }}" class="nav-link {{ request()->routeIs('status-peminjaman') ? 'active' : '' }}">Status Peminjaman</a>
                        </li>
                    </ul>
                    <!-- Toggle Dark Mode -->
                    <div class="theme-toggle ms-3">
                        <i id="toggle-dark-mode" class="bi bi-moon" role="button" aria-label="Toggle Dark Mode" tabindex="0"></i>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <main class="main">
        @yield('content')
    </main>

    <footer class="footer mt-auto py-3" id="footer">
        <div class="text-center">
            <span class="footer-text">Copyright © 2024 by LabAccess Universitas Pembangunan Jaya | All Rights Reserved</span>
        </div>
    </footer>

    <!-- Vendor JS Files -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- AOS Initialization -->
    <script>
        AOS.init();
    </script>

    <!-- Toggle Dark Mode Logic -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toggle = document.getElementById('toggle-dark-mode');
            const body = document.body;

            // Set initial theme from localStorage
            if (localStorage.getItem('theme') === 'dark') {
                body.classList.add('dark-mode');
                toggle.classList.replace('bi-moon', 'bi-sun');
            }

            // Add toggle event listener
            toggle.addEventListener('click', () => {
                if (body.classList.contains('dark-mode')) {
                    body.classList.remove('dark-mode');
                    localStorage.setItem('theme', 'light');
                    toggle.classList.replace('bi-sun', 'bi-moon');
                } else {
                    body.classList.add('dark-mode');
                    localStorage.setItem('theme', 'dark');
                    toggle.classList.replace('bi-moon', 'bi-sun');
                }
            });

            // Optional: Allow toggling with keyboard (Enter key)
            toggle.addEventListener('keypress', (e) => {
                if (e.key === 'Enter') {
                    toggle.click();
                }
            });
        });
    </script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>LabAccess - About</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('img/favicon.png') }}" rel="icon">
    <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/about.css') }}" rel="stylesheet">

</head>

<body class="about-page index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="{{ route('index') }}" class="logo d-flex align-items-center me-auto">
                <img src="{{ asset('img/logo.png') }}" alt="">
                <h1 class="sitename">LabAccess</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('index') }}">Home<br></a></li>
                    <li><a href="{{ route('about') }}" class="active">About</a></li>
                    <li><a href="{{ route('informasi') }}">Informasi</a></li>
                    <li><a href="{{ route('layanan') }}">Layanan</a></li>
                    <li><a href="{{ route('status-peminjaman') }}">Status Peminjaman</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </header>

    <main class="main">
        <section id="about" class="about section">
            <div class="container">
                <h2 class="text-center mb-4" data-aos="fade-up">Informasi Laboratorium</h2>

                <div class="project-container" data-aos="fade-up"  data-aos-delay="100">
                    <div class="project-card" data-project="lab506" data-aos="fade-right" data-aos-delay="200">
                        <div class="project-image" style="background-image: url('{{ asset('img/lab506.png') }}')"></div>
                        <div class="project-info">
                            <h3>Lab 506</h3>
                            <p>Lab Praktikum Alat</p>
                        </div>
                         <button class="project-button" data-project="lab506">Lihat Detail</button>
                    </div>
                    <div class="project-card" data-project="lab508" data-aos="fade-left" data-aos-delay="200">
                         <div class="project-image" style="background-image: url('{{ asset('img/lab508.png') }}')"></div>
                         <div class="project-info">
                            <h3>Lab 508</h3>
                            <p>Lab Komputer</p>
                        </div>
                         <button class="project-button" data-project="lab508">Lihat Detail</button>
                    </div>
                </div>
            </div>
            <div id="lab-popup" class="lab-popup">
                <div class="popup-content">
                    <span class="popup-close">×</span>
                    <h2 id="popup-title"></h2>
                    <p id="popup-description"></p>
                </div>
            </div>
        </section>
    </main>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script>
     
</body>

</html>
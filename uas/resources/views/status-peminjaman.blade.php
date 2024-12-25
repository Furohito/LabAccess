<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Status Peminjaman</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('img/favicon.png') }}" rel="icon">
    <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>

<body class="index-page">

    <!-- Navbar -->
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">
            <a href="{{ route('index') }}" class="logo d-flex align-items-center me-auto">
                <img src="{{ asset('img/logo.png') }}" alt="">
                <h1 class="sitename">LabAccess</h1>
            </a>
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li><a href="{{ route('about') }}">About</a></li>
                    <li><a href="{{ route('informasi') }}">Informasi</a></li>
                    <li><a href="{{ route('layanan') }}">Layanan</a></li>
                    <li><a href="{{ route('status-peminjaman') }}" class="active">Status Peminjaman</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main">
        <!-- Status Peminjaman Section -->
        <section id="contact" class="contact section">
            <div class="container section-title" data-aos="fade-up">
                <h2>Status Peminjaman</h2>
                <p>Cek Status Peminjaman Anda</p>
            </div><!-- End Section Title -->
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="tabel-peminjaman">
                                <thead>
                                    <tr>
                                        <th>Prasarana</th>
                                        <th>Tanggal</th>
                                        <th>Waktu</th>
                                        <th>Fasilitas</th>
                                        <th>Status Pengaju</th>
                                        <th>NIK / NIM</th>
                                        <th>No Whatsapp</th>
                                        <th>Penanggung Jawab</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pengajuan as $p)
                                    <tr>
                                        <td>{{ $p->fasilitas }}</td>
                                        <td>{{ $p->tanggal }}</td>
                                        <td>{{ $p->waktuMulai }} - {{ $p->waktuSelesai }}</td>
                                        <td>{{ $p->fasilitas }}</td>
                                        <td>{{ ucfirst($p->status) }}</td>
                                        <td>{{ $p->nikNim }}</td>
                                        <td>{{ $p->noWhatsapp }}</td>
                                        <td>{{ $p->penanggungJawab }}</td>
                                        <td>{{ $p->keterangan }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/aos/aos.js') }}"></script>
</body>

</html>
s
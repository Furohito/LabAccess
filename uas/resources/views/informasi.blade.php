<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>LabAccess - Informasi</title>
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
</head>

<body class="index-page informasi-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="{{ route('index') }}" class="logo d-flex align-items-center me-auto">
                <img src="{{ asset('img/logo.png') }}" alt="">
                <h1 class="sitename">LabAccess</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('index') }}">Home<br></a></li>
                    <li><a href="{{ route('about') }}">About</a></li>
                    <li><a href="{{ route('informasi') }}" class="active">Informasi</a></li>
                    <li><a href="{{ route('layanan') }}">Layanan</a></li>
                    <li><a href="{{ route('status-peminjaman') }}">Status Peminjaman</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </header>

    <main class="main">
         <!-- Jadwal Lab Section -->
         <section id="jadwal-lab" class="jadwal-lab section">
             <div class="container section-title" data-aos="fade-up">
                <h2>Jadwal Pemakaian Lab</h2>
                 <p>Informasi Jadwal Pemakaian Laboratorium</p>
            </div><!-- End Section Title -->
             <div class="container">
                  <div class="row">
                     <div class="col-md-6">
                         <h3 data-aos="fade-up" data-aos-delay="100">Lab B506</h3>
                         <div class="table-responsive"  data-aos="fade-up" data-aos-delay="200">
                           <table class="table table-bordered">
                             <thead>
                                <tr>
                                 <th>No</th>
                                 <th>Hari</th>
                                 <th>Pukul</th>
                                 <th>Nama Mata Kuliah</th>
                                 <th>Pengajar</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>1</td>
                                <td>Senin</td>
                                <td>15.30 s.d 18.00 WIB</td>
                                <td>Sistem Tertanam (INF-A)</td>
                                <td>Prio Handoko, S.Kom., M.T.I.</td>
                             </tr>
                              <tr>
                                <td>2</td>
                                 <td>Selasa</td>
                                 <td>07.30 s.d 10.00 WIB</td>
                                 <td>Komunikasi Antar Perangkat</td>
                                 <td>Rinto Priambodo, S.T., M.T.I.</td>
                               </tr>
                                <tr>
                                 <td>3</td>
                                  <td>Rabu</td>
                                 <td>10.10 s.d 12.40 WIB</td>
                                 <td>Pengenalan Sistem Digital</td>
                                  <td>Mohammad Nasucha, S.T., M.Sc., Ph.D.</td>
                               </tr>
                               <tr>
                                <td>4</td>
                                 <td>Rabu</td>
                                 <td>15.30 s.d 18.00 WIB</td>
                                 <td>Sistem Tertanam (INF-A)</td>
                                  <td>Prio Handoko, S.Kom., M.T.I.</td>
                             </tr>
                            </tbody>
                           </table>
                        </div>
                    </div>
                    <div class="col-md-6">
                     <h3 data-aos="fade-up" data-aos-delay="100">Lab B508</h3>
                        <div class="table-responsive"  data-aos="fade-up" data-aos-delay="200">
                             <table class="table table-bordered">
                                <thead>
                                   <tr>
                                       <th>No</th>
                                       <th>Hari</th>
                                        <th>Pukul</th>
                                        <th>Nama Mata Kuliah</th>
                                       <th>Pengajar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <tr>
                                       <td>1</td>
                                        <td>Senin</td>
                                      <td>10.10 s.d 12.40 WIB</td>
                                     <td>Pemrograman Sistem Jaringan</td>
                                       <td>Hendi Hermawan, S.T., M.T.I.</td>
                                    </tr>
                                    <tr>
                                       <td>2</td>
                                        <td>Senin</td>
                                        <td>13.00 s.d 15.30 WIB</td>
                                       <td>Jaringan Komputer (INF-A)</td>
                                        <td>Dr. Ida Nurhaida, S.T., M.T.</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                       <td>Selasa</td>
                                        <td>07.30 s.d 10.00 WIB</td>
                                       <td>Pengenalan Komputasi (INF-B)</td>
                                      <td>Lathifah Alfat, S.T., M.T.</td>
                                   </tr>
                                    <tr>
                                     <td>4</td>
                                       <td>Rabu</td>
                                        <td>10.10 s.d 15.10 WIB</td>
                                        <td>Jaringan Komputer (INF-B)</td>
                                       <td>Dr. Ida Nurhaida, S.T., M.T.</td>
                                    </tr>
                                    <tr>
                                       <td>5</td>
                                       <td>Kamis</td>
                                        <td>07.30 s.d 10.00 WIB</td>
                                        <td>Basis Data (INF-B)</td>
                                        <td>Riny Nurhayati, S.T., M.T.I.</td>
                                   </tr>
                                    <tr>
                                        <td>6</td>
                                         <td>Kamis</td>
                                        <td>10.10 s.d 12.40 WIB</td>
                                        <td>Matematika Diskrit (INF-A)</td>
                                        <td>Mohammad Nasucha, S.T., M.Sc., Ph.D.</td>
                                    </tr>
                                   <tr>
                                        <td>7</td>
                                        <td>Kamis</td>
                                       <td>12.50 s.d 15.20 WIB</td>
                                        <td>Matematika Diskrit (INF-B)</td>
                                         <td>Mohammad Nasucha, S.T., M.Sc., Ph.D.</td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Kamis</td>
                                       <td>15.30 s.d 18.00 WIB</td>
                                        <td>Visi Komputer</td>
                                        <td>Mohammad Nasucha, S.T., M.Sc., Ph.D.</td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                       <td>Jum'at</td>
                                        <td>10.10 s.d 12.40 WIB</td>
                                      <td>Sistem Cerdas (INF-A)</td>
                                        <td>Mohammad Nasucha, S.T., M.Sc., Ph.D.</td>
                                   </tr>
                                   <tr>
                                       <td>10</td>
                                        <td>Jum'at</td>
                                       <td>13.00 s.d 15.30 WIB</td>
                                        <td>Desain dan Analisis Algoritma (INF-B)</td>
                                        <td>Riny Nurhayati, S.T., M.T.I.</td>
                                    </tr>
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

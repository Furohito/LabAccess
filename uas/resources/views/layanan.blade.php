<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>LabAccess - Layanan</title>

    <!-- Favicons -->
    <link href="{{ asset('img/favicon.png') }}" rel="icon">
    <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>

<body class="index-page layanan-page">

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
                    <li><a href="{{ route('layanan') }}" class="active">Layanan</a></li>
                    <li><a href="{{ route('status-peminjaman') }}">Status Peminjaman</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="main">
        <!-- Services Section -->
        <section id="services" class="services section">
            <div class="container section-title" data-aos="fade-up">
                <h2>Pengajuan Peminjaman</h2>
                <p>Pilih ruangan atau fasilitas yang tersedia</p>
            </div><!-- End Section Title -->

            <div class="container">
                <div class="row gy-4">
                    <!-- Left Column (Form) -->
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Formulir Pengajuan</h5>
                                <form action="{{ route('pengajuan.store') }}" method="POST">
                                    @csrf
                                    
                                    <!-- Nama and Email Fields -->
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" required>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>

                                    <!-- Other Fields -->
                                    <div class="mb-3">
                                        <label for="tanggal" class="form-label">Tanggal</label>
                                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="waktuMulai" class="form-label">Waktu Mulai</label>
                                            <input type="time" class="form-control" id="waktuMulai" name="waktuMulai" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="waktuSelesai" class="form-label">Waktu Selesai</label>
                                            <input type="time" class="form-control" id="waktuSelesai" name="waktuSelesai" required>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="prasarana" class="form-label">Prasarana</label>
                                        <select class="form-select" id="prasarana" name="prasarana" required>
                                            <option value="" disabled selected>Pilih Ruangan</option>
                                            <option value="lab506">Lab 506</option>
                                            <option value="lab508">Lab 508</option>
                                            <option value="both">Lab 506 & 508</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="jumlahPeserta" class="form-label">Jumlah Peserta</label>
                                        <input type="number" class="form-control" id="jumlahPeserta" name="jumlahPeserta" placeholder="Jumlah Peserta" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="fasilitas" class="form-label">Fasilitas yang Digunakan</label>
                                        <select class="form-select" id="fasilitas" name="fasilitas" required>
                                            <option value="ruangan">Ruangan Saja</option>
                                            <option value="alat">Alat untuk Aktivitas Kerja</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="keterangan" class="form-label">Keterangan</label>
                                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3" placeholder="Masukkan Keterangan" required></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="statusPengaju" class="form-label">Status Pengaju</label>
                                        <select class="form-select" id="statusPengaju" name="statusPengaju" required>
                                            <option value="mahasiswa">Mahasiswa</option>
                                            <option value="dosen">Dosen</option>
                                            <option value="staff">Staff</option>
                                            <option value="tendik">Tenaga Kependidikan</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="nikNim" class="form-label">NIK / NIM</label>
                                        <input type="text" class="form-control" id="nikNim" name="nikNim" placeholder="Masukkan NIK / NIM Anda" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="noWhatsapp" class="form-label">No Whatsapp</label>
                                        <input type="text" class="form-control" id="noWhatsapp" name="noWhatsapp" placeholder="Masukkan No Whatsapp Anda" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="penanggungJawab" class="form-label">Penanggung Jawab Kegiatan/Acara</label>
                                        <input type="text" class="form-control" id="penanggungJawab" name="penanggungJawab" placeholder="Masukkan Nama Penanggung Jawab" required>
                                    </div>

                                    <button type="submit" class="btn btn-primary" id="submitBtn" disabled>Kirim Pengajuan</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column (Calendar) -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Pesan Sekarang</h5>
                                <p class="card-text">Pilih tanggal di kalender, lalu lakukan pemesanan.</p>
                                <button type="button" class="btn btn-primary" id="ajukanBtn" disabled>
                                    Ajukan Peminjaman
                                </button>
                            </div>
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

    <!-- Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        // Enable button when the user selects date and time
        document.getElementById('tanggal').addEventListener('change', checkForm);
        document.getElementById('waktuMulai').addEventListener('change', checkForm);
        document.getElementById('waktuSelesai').addEventListener('change', checkForm);

        function checkForm() {
            const tanggal = document.getElementById('tanggal').value;
            const waktuMulai = document.getElementById('waktuMulai').value;
            const waktuSelesai = document.getElementById('waktuSelesai').value;
            const ajukanBtn = document.getElementById('ajukanBtn');
            const submitBtn = document.getElementById('submitBtn');

            // Enable buttons only if all fields are filled
            if (tanggal && waktuMulai && waktuSelesai) {
                ajukanBtn.disabled = false;
                submitBtn.disabled = false;
            } else {
                ajukanBtn.disabled = true;
                submitBtn.disabled = true;
            }
        }
    </script>
</body>

</html>

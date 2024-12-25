<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>

<body>

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">
            <a href="{{ route('admin.index') }}" class="logo d-flex align-items-center me-auto">
                <img src="{{ asset('img/logo.png') }}" alt="">
                <h1 class="sitename">LabAccess - Admin Dashboard</h1>
            </a>
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('admin.index') }}" class="active">Dashboard</a></li>
                    <!-- Tambahkan menu lainnya sesuai kebutuhan -->
                </ul>
            </nav>
        </div>
    </header>

    <main class="main">
        <section id="dashboard" class="dashboard section">
            <div class="container section-title" data-aos="fade-up">
                <h2>Dashboard Admin</h2>
                <p>Data Pengajuan Peminjaman</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Email</th> <!-- Kolom email ditambahkan -->
                                        <th>Fasilitas</th>
                                        <th>Status Pengajuan</th>
                                        <th>NIK / NIM</th>
                                        <th>No Whatsapp</th>
                                        <th>Penanggung Jawab</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pengajuan as $p)
                                    <tr>
                                        <td>{{ $p->nama }}</td>
                                        <td>{{ $p->email }}</td> <!-- Menampilkan email -->
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

    <!-- Vendor JS Files -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/aos/aos.js') }}"></script>

</body>

</html>

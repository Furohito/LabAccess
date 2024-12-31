@extends('layouts.main')

@section('title', 'Layanan')

@section('content')
<style>
    /* Light and Dark Mode Styles */
    body.light-mode {
        background-color: #ffffff;
        color: #000000;
    }

    body.dark-mode {
        background-color: #121212;
        color: #ffffff;
    }

    body.dark-mode .form-label {
        color: #ffffff;
    }

    body.dark-mode .card {
        background-color: #1e1e1e;
        color: #ffffff;
    }

    body.dark-mode .btn {
        background-color: #444444;
        color: #ffffff;
    }

    body.dark-mode input, body.dark-mode textarea, body.dark-mode select {
        background-color: #2b2b2b;
        color: #ffffff;
        border: 1px solid #444444;
    }

    body.light-mode input, body.light-mode textarea, body.light-mode select {
        background-color: #ffffff;
        color: #000000;
    }

        /* Pop-in Animation */
        @keyframes popIn {
        0% {
            opacity: 0;
            transform: translateY(30px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
        }

        #layanan-page .pop-in {
        animation: popIn 0.6s ease-out;
        }
/* Animation for layanan page */
#layanan-page {
    animation: fadeIn 1s ease-in-out;
}

@keyframes fadeIn {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}

/* Animation for form labels */
.form-label {
    position: relative;
    display: inline-block;
    animation: slideIn 0.5s ease-in-out;
}

@keyframes slideIn {
    0% {
        opacity: 0;
        transform: translateX(-20px);
    }
    100% {
        opacity: 1;
        transform: translateX(0);
    }
}

/* Default placeholder color (light mode) */
::placeholder {
    color: #6c757d; /* Warna abu-abu */
    opacity: 1; /* Pastikan terlihat jelas */
}

/* Placeholder color for dark mode */
body.dark-mode ::placeholder {
    color:rgb(255, 255, 255); /* Warna putih untuk mode gelap */
}


</style>


<div id="layanan-page" class="py-5">
    <div class="container">
        <div class="container section-title pop-in">
            <h2>Pengajuan Peminjaman</h2>
            <p>Pilih Ruangan dan Fasilitas Yang Tersedia</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

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
                                <option value="" disabled selected>Pilih Fasilitas</option>
                                    <option value="ruangan">Ruangan Saja</option>
                                    <option value="alat">Ruang Serta Alat untuk Aktivitas Kerja</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="3" placeholder="Masukkan Keterangan" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="statusPengaju" class="form-label">Status Pengaju</label>
                                <select class="form-select" id="statusPengaju" name="statusPengaju" required>
                                <option value="" disabled selected>Status Anda</option>
                                    <option value="mahasiswa">Mahasiswa</option>
                                    <option value="dosen">Dosen</option>
                                    <option value="staff">Staff</option>
                                    <option value="tendik">Tenaga Kependidikan</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="nikNim" class="form-label">NIDN / NIM</label>
                                <input type="text" class="form-control" id="nikNim" name="nikNim" placeholder="Masukkan NIDN / NIM Anda" required>
                            </div>

                            <div class="mb-3">
                                <label for="noWhatsapp" class="form-label">No Whatsapp</label>
                                <input type="text" class="form-control" id="noWhatsapp" name="noWhatsapp" placeholder="Masukkan No Whatsapp Anda" required>
                            </div>

                            <div class="mb-3">
                                <label for="penanggungJawab" class="form-label">Penanggung Jawab Kegiatan/Acara</label>
                                <input type="text" class="form-control" id="penanggungJawab" name="penanggungJawab" placeholder="Masukkan Nama Penanggung Jawab" required>
                            </div>

                            <button type="submit" class="btn btn-primary" id="submitBtn">Kirim Pengajuan</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Right Column (Notes Section) -->
<div class="col-md-4">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Catatan Penting!</h5>
            <p class="card-text">
                <strong>Tutorial Singkat:</strong> Pilih tanggal di kalender yang tersedia untuk melakukan pemesanan.
            </p>
            <p class="card-text">
                <strong>Informasi:</strong> Pastikan tidak memilih jadwal yang sedang terdapat pembelajaran kuliah. Silakan lihat tabel informasi untuk detailnya.
            </p>
        </div>
    </div>
</div>

        </div>
    </div>
</div>
@endsection

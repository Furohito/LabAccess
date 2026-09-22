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

/* Form Label, Card Title, and Card Text */
body.dark-mode .form-label,
body.dark-mode .card-title,
body.dark-mode .card-text {
    color: #ffffff;
}

/* Card Background and Text */
body.dark-mode .card {
    background-color: #1e1e1e;
    color: #ffffff;
}

/* Buttons */
body.dark-mode .btn {
    background-color: #444444;
    color: #ffffff;
}

/* Input, Textarea, and Select */
body.dark-mode input,
body.dark-mode textarea,
body.dark-mode select {
    background-color: #2b2b2b;
    color: #ffffff;
    border: 1px solid #444444;
}

body.light-mode input,
body.light-mode textarea,
body.light-mode select {
    background-color: #ffffff;
    color: #000000;
    border: 1px solid #ddd;
}

/* Calendar Styling */
#calendar {
    margin-top: 20px;
    background: #ffffff;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 10px;
}

body.dark-mode #calendar {
    background-color: #1e1e1e;
    color: #ffffff;
}

body.dark-mode .fc-daygrid-day-number {
    color: #ffffff; /* Teks tanggal di dark mode */
}

body.light-mode .fc-daygrid-day-number {
    color: #000000; /* Teks tanggal di light mode */
}

/* Modal Footer Buttons */
.modal-footer .btn-secondary {
    background-color: #6c757d; /* Abu-abu */
    color: #ffffff; /* Teks putih */
    border: none; /* Menghapus border */
}

.modal-footer .btn-primary {
    background-color: #007bff; /* Biru */
    color: #ffffff; /* Teks putih */
    border: none; /* Menghapus border */
}

/* Hover Effects for Buttons */
.modal-footer .btn-secondary:hover {
    background-color: #5a6268; /* Abu-abu lebih gelap saat hover */
}

.modal-footer .btn-primary:hover {
    background-color: #0056b3; /* Biru lebih gelap saat hover */
}

/* Dark Mode for Modal Footer Buttons */
body.dark-mode .modal-footer .btn-secondary {
    background-color: #444; /* Abu-abu gelap */
    color: #ffffff; /* Teks putih */
}

body.dark-mode .modal-footer .btn-primary {
    background-color: #007bff; /* Biru */
    color: #ffffff; /* Teks putih */
}

body.dark-mode .modal-footer .btn-secondary:hover {
    background-color: #666; /* Abu-abu lebih terang saat hover */
}

body.dark-mode .modal-footer .btn-primary:hover {
    background-color: #0056b3; /* Biru lebih gelap saat hover */
}

/* Modal Content Styling */
body.dark-mode .modal-content {
    background-color: #1e1e1e; /* Background modal di dark mode */
    color: #ffffff; /* Teks modal di dark mode */
}

body.dark-mode .modal-content input,
body.dark-mode .modal-content textarea,
body.dark-mode .modal-content select {
    background-color: #2b2b2b; /* Background input di dark mode */
    color: #ffffff; /* Teks input di dark mode */
    border: 1px solid #444444; /* Border input */
}

body.light-mode .modal-content {
    background-color: #ffffff; /* Background modal di light mode */
    color: #000000; /* Teks modal di light mode */
}

body.light-mode .modal-content input,
body.light-mode .modal-content textarea,
body.light-mode .modal-content select {
    background-color: #ffffff; /* Background input di light mode */
    color: #000000; /* Teks input di light mode */
    border: 1px solid #ddd; /* Border input */
}


</style>

<div id="layanan-page" class="py-5">
    <div class="container">
        <div class="section-title">
            <h2>Pengajuan Peminjaman</h2>
            <p>Klik pada tanggal di kalender untuk membuat pengajuan</p>
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
            <!-- Kalender -->
            <div class="col-md-8">
                <div id="calendar"></div>
            </div>

            <!-- Catatan Penting -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Catatan Penting!</h5>
                        <p class="card-text">
                            <strong>Tutorial Singkat:</strong> Pilih tanggal di kalender yang tersedia untuk melakukan pemesanan.
                        </p>
                        <p class="card-text">
                            <strong>Informasi:</strong> Pastikan tidak memilih jadwal yang sedang terdapat pembelajaran kuliah.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk Form Pengajuan -->
<div class="modal fade" id="event-modal" tabindex="-1" aria-labelledby="event-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('pengajuan.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="event-modal-label">Pengajuan Peminjaman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="tanggal" name="tanggal">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
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
                        <input type="number" class="form-control" id="jumlahPeserta" name="jumlahPeserta" required>
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
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
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
                        <input type="text" class="form-control" id="nikNim" name="nikNim" required>
                    </div>
                    <div class="mb-3">
                        <label for="noWhatsapp" class="form-label">No Whatsapp</label>
                        <input type="text" class="form-control" id="noWhatsapp" name="noWhatsapp" required>
                    </div>
                    <div class="mb-3">
                        <label for="penanggungJawab" class="form-label">Penanggung Jawab</label>
                        <input type="text" class="form-control" id="penanggungJawab" name="penanggungJawab" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Kirim Pengajuan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Tambahkan Library FullCalendar -->
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var modal = new bootstrap.Modal(document.getElementById('event-modal'));

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: '/get-events', // Endpoint untuk mengambil data event dari database
            dateClick: function (info) {
                // Isi tanggal di form saat tanggal diklik
                document.getElementById('tanggal').value = info.dateStr;
                modal.show();
            },
            eventClick: function (info) {
                alert('Pengajuan: ' + info.event.title);
            },
        });

        calendar.render();
    });
</script>

@endsection

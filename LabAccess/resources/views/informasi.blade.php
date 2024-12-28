@extends('layouts.main')

@section('title', 'Informasi')

@section('content')
<style>

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

    .pop-in {
        animation: popIn 0.6s ease-out;
    }

    body {
        transition: background-color 0.5s ease, color 0.5s ease;
    }

    .jadwal-lab h2, .jadwal-lab p, .jadwal-lab h3 {
        transition: color 0.5s ease;
    }

    .table {
        margin-bottom: 0;
        transition: background-color 0.5s ease, color 0.5s ease, border-color 0.5s ease;
    }

    /* Light Mode Styles */
    body.light-mode {
        background-color: #ffffff;
        color: #000000;
    }

    body.light-mode .jadwal-lab h2,
    body.light-mode .jadwal-lab p,
    body.light-mode .jadwal-lab h3 {
        color: #000000;
    }

    body.light-mode .table {
        background-color: #ffffff;
        color: #000000;
        border-color: #dddddd;
    }

    body.light-mode .table th, 
    body.light-mode .table td {
        border-color: #dddddd;
    }

    /* Dark Mode Styles */
    body.dark-mode {
        background-color: #121212;
        color: #ffffff;
    }

    body.dark-mode .jadwal-lab h2,
    body.dark-mode .jadwal-lab p,
    body.dark-mode .jadwal-lab h3 {
        color: #ffffff;
    }

    body.dark-mode .table {
        background-color: #000000; /* Latar belakang tabel menjadi hitam */
        color: #ffffff; /* Warna teks dalam tabel menjadi putih */
        border-color: #444444;
    }

    body.dark-mode .table th, 
    body.dark-mode .table td {
        border-color: #444444; /* Warna border tabel dalam mode gelap */
    }
</style>
<div id="jadwal-lab" class="jadwal-lab py-5">
    <div class="container section-title pop-in">
        <h2>Jadwal Pemakaian Lab</h2>
        <p>Informasi Jadwal Pemakaian Laboratorium</p>
    </div>

    <div class="container">
        <div class="row">
            <!-- Lab B506 -->
            <div class="col-md-6 pop-in">
                <h3>Lab B506</h3>
                <div class="table-responsive">
                    <table class="table table-bordered" id="schedule-table">
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
            <!-- Lab B508 -->
            <div class="col-md-6 pop-in">
                <h3>Lab B508</h3>
                <div class="table-responsive">
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
</div>
@endsection
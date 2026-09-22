@extends('layouts.main')

@section('title', 'About')

@section('content')
<link href="{{ asset('css/about.css') }}" rel="stylesheet">
<style>
    /* ========== LIGHT MODE (DEFAULT) ========== */
    body {
      background-color: #f8f9fa; 
      color: #212529;
    }

    /* Container row & col */
    .row.justify-content-center {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
    }

    /* Features container (light mode) */
    #features {
      background-color: #ffffff;
      color: #212529;
    }

    /* Project Card (untuk Lab) */
    .project-card {
        background-color: #ffffff; 
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        max-width: 300px;
        margin: 15px auto; /* <-- Pastikan auto untuk center */
        text-align: center;
    }
    .project-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
    }
    .project-image {
        height: 30vh; /* Sesuaikan tinggi gambar */
        background-size: cover;
        background-position: center;
        width: 100%;
    }
    .project-info {
        padding: 20px;
        text-align: center;
    }

    /* Popup (untuk Lab) */
    #lab-popup {
        position: fixed;
        top: 0; 
        left: 0;
        width: 100%; 
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }
    #lab-popup.popup-visible {
        display: flex !important;
    }
    .popup-content {
        background-color: #ffffff;
        color: #000;
        padding: 2rem;
        border-radius: 8px;
        max-width: 600px;
        width: 80%;
        position: relative;
    }
    .popup-close {
        cursor: pointer;
        font-size: 1.8rem;
        color: red;
        position: absolute;
        top: 10px;
        right: 10px;
    }

    /* About Container Animation */
    #about-container {
        animation: popUp 0.6s ease-out;
    }
    @keyframes popUp {
        0% { opacity: 0; transform: translateY(30px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    /* Pop-in Animation */
    @keyframes popIn {
        0% { opacity: 0; transform: translateY(30px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    .pop-in {
        animation: popIn 0.6s ease-out;
    }

    /* Feature Card (mirip Project Card) */
    .feature-card {
        background-color: #ffffff; 
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        max-width: 300px;
        margin: 15px auto; /* agar center di kolom */
        text-align: center;
    }
    .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
    }
    .feature-image {
        height: 200px; /* Atur sesuai selera */
        background-size: cover;
        background-position: center;
        width: 100%;
    }
    .feature-info {
        padding: 20px;
    }

    /* ========== DARK MODE ========== */
    body.dark-mode {
      background-color: #121212; 
      color: #ffffff;
    }
    /* Project Card (Dark) */
    body.dark-mode .project-card {
        background-color: #1e1e1e;
        color: #ffffff;
    }
    body.dark-mode .project-info h3, 
    body.dark-mode .project-info p {
        color: #ffffff;
    }
    /* Popup (Dark) */
    body.dark-mode .popup-content {
        background-color: #1e1e1e;
        color: #ffffff;
        box-shadow: 0 8px 25px rgba(255, 255, 255, 0.1);
    }
    body.dark-mode .popup-close {
        color: #ff4f4f;
    }

    /* Features (Dark) */
    body.dark-mode #features {
      background-color: #121212;
      color: #ffffff;
    }
    body.dark-mode .feature-card {
        background-color: #1e1e1e;
        color: #ffffff;
    }
    body.dark-mode .feature-info h3, 
    body.dark-mode .feature-info p {
        color: #ffffff;
    }
</style>

<!-- About Container -->
<div id="about-container" class="py-5">
    <div class="container section-title pop-in">
        <h2>Informasi Laboratorium</h2>
        <p>Mengenal Laboratorium</p>

        <!-- Lab Cards -->
        <div class="row justify-content-center">
            <!-- Card Lab 506 -->
            <div class="col-md-6 col-lg-5">
                <div class="project-card">
                    <div class="project-image" 
                         style="background-image: url('{{ asset('img/lab506.png') }}');">
                    </div>
                    <div class="project-info">
                        <h3>Lab 506</h3>
                        <p>Lab Praktikum Alat</p>
                        <button class="project-button btn btn-outline-primary mt-3" data-project="lab506">
                            <i class="fas fa-info-circle"></i> Lihat Detail
                        </button>
                    </div>
                </div>
            </div>
            <!-- Card Lab 508 -->
            <div class="col-md-6 col-lg-5">
                <div class="project-card">
                    <div class="project-image" 
                         style="background-image: url('{{ asset('img/lab508.png') }}');">
                    </div>
                    <div class="project-info">
                        <h3>Lab 508</h3>
                        <p>Lab Komputer</p>
                        <button class="project-button btn btn-outline-primary mt-3" data-project="lab508">
                            <i class="fas fa-info-circle"></i> Lihat Detail
                        </button>
                    </div>
                </div>
            </div>
        </div><!-- /row -->
    </div>

    <!-- Popup Lab -->
    <div id="lab-popup">
        <div class="popup-content">
            <span class="popup-close">&times;</span>
            <h2 id="popup-title"></h2>
            <p id="popup-description"></p>
        </div>
    </div>
</div>
<!-- End About Container -->

<!-- Features Section -->
<section id="features" class="py-5">
  <div class="container section-title">
    <h2>Fitur</h2>
    <p>Kelengkapan Laboratorium</p>
  </div>
  <div class="container">
    <div class="row justify-content-center">

      <!-- Feature Card 1 -->
      <div class="col-md-6 col-lg-4">
        <div class="feature-card">
          <div class="feature-image" 
               style="background-image: url('{{ asset('img/komputerlab.png') }}');">
          </div>
          <div class="feature-info">
            <h3>Alat Praktikum Komputer</h3>
            <p>Digunakan untuk kegiatan praktikum yang memerlukan PC</p>
          </div>
        </div>
      </div>

      <!-- Feature Card 2 -->
      <div class="col-md-6 col-lg-4">
        <div class="feature-card">
          <div class="feature-image" 
               style="background-image: url('{{ asset('img/jaringan.jpg') }}');">
          </div>
          <div class="feature-info">
            <h3>Alat Praktikum Jaringan</h3>
            <p>Switch, router, dan kabel untuk praktikum jaringan</p>
          </div>
        </div>
      </div>

      <!-- Feature Card 3 -->
      <div class="col-md-6 col-lg-4">
        <div class="feature-card">
          <div class="feature-image" 
               style="background-image: url('{{ asset('img/embeded.png') }}');">
          </div>
          <div class="feature-info">
            <h3>Alat Praktikum Sistem Tertanam</h3>
            <p>Board mikrokontroler, Arduino, modul sensor dsb.</p>
          </div>
        </div>
      </div>

    </div><!-- /row -->
  </div><!-- /container -->
</section>
<!-- End Features Section -->

<script>
// (Opsional) Toggle Dark Mode
function toggleDarkMode() {
  document.body.classList.toggle('dark-mode');
}

document.addEventListener('DOMContentLoaded', function () {
    // ---------- LAB POPUP ----------
    const projectButtons = document.querySelectorAll('.project-button');
    const labPopup = document.getElementById('lab-popup');
    const labPopupTitle = document.getElementById('popup-title');
    const labPopupDesc = document.getElementById('popup-description');
    const closeLabPopup = labPopup.querySelector('.popup-close');

    // Detail lab
    const labDetails = {
        lab506: {
            title: 'Lab 506 - Praktikum Alat',
            description: 'Lab 506 adalah laboratorium yang didedikasikan untuk kegiatan praktikum dengan alat-alat fisik. Lab ini dilengkapi dengan berbagai peralatan yang mendukung kegiatan eksperimen dan observasi untuk berbagai mata kuliah. Mahasiswa dapat menggunakan lab ini untuk melakukan praktikum sesuai dengan panduan yang telah ditetapkan.'
        },
        lab508: {
            title: 'Lab 508 - Lab Komputer',
            description: 'Lab 508 adalah laboratorium komputer yang diperuntukkan bagi aktivitas perkuliahan dan penggunaan oleh mahasiswa. Lab ini dilengkapi dengan sejumlah komputer dan fasilitas pendukung yang dapat digunakan mahasiswa untuk belajar, mengerjakan tugas, atau melakukan aktivitas lainnya yang membutuhkan fasilitas komputer. Laboratorium ini juga sering digunakan untuk kegiatan praktikum yang menggunakan software atau aplikasi khusus.'
        }
    };

    // Klik button "Lihat Detail" => buka popup
    projectButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const projectKey = btn.getAttribute('data-project');
            const details = labDetails[projectKey];
            if (details) {
                labPopupTitle.textContent = details.title;
                labPopupDesc.textContent = details.description;
                labPopup.classList.add('popup-visible');
            }
        });
    });

    // Tutup popup
    closeLabPopup.addEventListener('click', () => {
        labPopup.classList.remove('popup-visible');
    });
    window.addEventListener('click', (e) => {
        if (e.target === labPopup) {
            labPopup.classList.remove('popup-visible');
        }
    });
});
</script>
@endsection

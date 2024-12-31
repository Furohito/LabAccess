@extends('layouts.main')

@section('title', 'Home')

@section('content')
<style>
    /* Animasi untuk gambar melayang-layang */
    @keyframes float {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-10px);
        }
    }

    #hero-image {
        animation: float 3s ease-in-out infinite;
    }

    /* Transisi halus untuk mode */
    #hero-container {
        transition: all 0.5s ease;
    }

    #hero-title {
    font-family: 'Artegra Soft', sans-serif; /* Use the Artegra Soft font */
    font-weight: bold; /* Ensure it's bold */
    font-size: 3rem; /* Adjust font size */
    color: #007bff; /* Set the desired color */
    transition: color 0.3s ease; /* Optional: Smooth color transition */
}


    body.dark-mode #hero-title {
        color: #66b2ff; /* Change color for dark mode */
    }

    #hero-description {
    text-align: justify; /* Membuat teks justify */
    text-justify: inter-word; /* Menambahkan spasi antara kata */
    margin-top: 10px; /* Memberikan sedikit ruang di atas (opsional) */
}


</style>

<div id="hero-container" class="py-5" style="transition: all 0.5s ease;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 order-2 order-lg-1 text-center text-lg-start">
                <h1 id="hero-title" class="display-4">Selamat Datang!</h1>
                <p id="hero-description" id="yapping" class="lead">
                    Platform ini diciptakan untuk mempermudah para civitas Informatika Universitas Pembangunan Jaya dalam mengelola peminjaman ruangan laboratorium. Sistem terintegrasi ini memungkinkan Anda memeriksa ketersediaan, melakukan pemesanan, dan memastikan kebutuhan akademik terpenuhi dengan efisien.
                </p>
                <div class="d-flex flex-column flex-md-row align-items-center">
                    <a href="{{ route('about') }}" id="hero-button" class="btn btn-primary btn-lg me-3 mb-3 mb-md-0" style="background-color: #007bff; border-color: #007bff;">
                        Eksplorasi <i class="bi bi-arrow-right"></i>
                    </a>
                    <a href="https://youtu.be/Ke91mP-t8zg?si=VEsRAVrN89b9lNP7" class="glightbox btn-watch-video btn btn-secondary btn-lg d-flex align-items-center justify-content-center ms-0 ms-md-4" target="_blank"><i class="bi bi-play-circle"></i><span class="ms-2">Profil Informatika</span></a>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img id="hero-image" src="{{ asset('img/hero-img.png') }}" class="img-fluid floating" alt="Hero Image">
            </div>
        </div>
    </div>
</div>

{{-- <script>
    document.addEventListener('DOMContentLoaded', () => {
        const heroContainer = document.getElementById('hero-container');
        const heroTitle = document.getElementById('hero-title');
        const heroDescription = document.getElementById('hero-description');
        const heroButton = document.getElementById('hero-button');
        const toggle = document.getElementById('toggle-dark-mode');

        // Apply dark mode
        const applyDarkMode = () => {
            console.log('Applying Dark Mode');
            heroContainer.style.backgroundColor = '#121212';
            heroContainer.style.color = '#ffffff';
            heroTitle.style.color = '#ffffff';
            heroDescription.style.color = '#cccccc';
            heroButton.style.backgroundColor = ''; // Bootstrap default blue
            heroButton.style.color = ''; // Bootstrap default white
        };

        // Apply light mode
        const applyLightMode = () => {
            console.log('Applying Light Mode');
            heroContainer.style.backgroundColor = '#ffffff';
            heroContainer.style.color = '#000000';
            heroTitle.style.color = '#000000';
            heroDescription.style.color = '#555555';
            heroButton.style.backgroundColor = ''; // Bootstrap default blue
            heroButton.style.color = ''; // Bootstrap default white
        };

        // Initialize theme
        const currentTheme = localStorage.getItem('theme');
        if (currentTheme === 'dark') {
            applyDarkMode();
        } else {
            applyLightMode();
        }

        // Toggle theme
        toggle.addEventListener('click', () => {
            const currentTheme = localStorage.getItem('theme');
            if (currentTheme === 'dark') {
                localStorage.setItem('theme', 'light');
                applyLightMode();
            } else {
                localStorage.setItem('theme', 'dark');
                applyDarkMode();
            }
        });
    });
</script> --}}
@endsection

# LabAccess - Sistem Peminjaman Laboratorium

LabAccess adalah aplikasi web yang dirancang untuk memudahkan pengelolaan dan peminjaman laboratorium di lingkungan pendidikan. Aplikasi ini menyediakan fitur untuk memonitor ketersediaan perangkat, memesan laboratorium, mengelola jadwal, dan mempermudah proses peminjaman secara online.

## Fitur Utama

*   **Halaman Utama (Home):** Informasi umum tentang LabAccess dan fitur utama.
*   **Halaman Tentang (About):** Detail tentang tim pengembang dan deskripsi aplikasi.
*   **Halaman Layanan (Layanan):** Formulir peminjaman dan kalender untuk pemesanan laboratorium.
*   **Halaman Informasi (Informasi):** Tabel informasi jadwal pemakaian laboratorium.
*   **Halaman Status Peminjaman (Status Peminjaman):** Cek dan riwayat status peminjaman.
*  **Admin Panel:** Akses data peminjaman, dan mengubah status peminjaman
*   **Autentikasi:** Halaman login dan daftar (register).
*   **Responsif:** Tampilan yang responsif di berbagai ukuran layar.
*  **Theme Toggle:** Mode tema terang dan gelap

## Teknologi yang Digunakan

*   **Frontend:**
    *   HTML5
    *   CSS3
    *   JavaScript
    *   Bootstrap 5
    *   AOS (Animate On Scroll)
    *    FullCalendar
*   **Backend:**
    *   PHP
    *   MySQL

## Struktur Direktori

labaccess/  (Nama folder root proyek)
├── assets/
│   ├── css/
│   │   ├── main.css
│   │   ├── autentikasi.css
│   │   └── layanan.css
│   ├── js/
│   │   ├── main.js
│   │   ├── autentikasi.js
│   │   ├── layanan.js
│   │   └── status-peminjaman.js
│   ├── img/
│   │    ├── favicon.png
│   │    ├── apple-touch-icon.png
│   │    ├── hero-img.png
│   │    ├── logo.png
│   │    ├── about.jpg
│   │    ├── values-1.png
│   │    ├── values-2.png
│   │    ├── values-3.png
│   │    ├── features.png
│   │    ├── alt-features.png
│   │    ├── lab-1.png
│   │    ├── lab-2.png
│   │    ├── lab-506.png
│   │    ├── lab-508.png
│   │    ├── blog/
│   │    │     ├── blog-1.jpg
│   │    │     ├── blog-2.jpg
│   │    │     └── blog-3.jpg
│   │    └── team/
│   │         ├── team-1.jpg
│   │         ├── team-2.jpg
│   │         ├── team-3.jpg
│   │         └── team-4.jpg
│   └── vendor/
│       └── ... (bootstrap, dll)
├── views/
│   └── atk/
│        ├── admin.html
│        ├── login.html
│        └── register.html
├── index.html
├── about.html
├── layanan.html
├── informasi.html
├── status-peminjaman.html
├── ambil-peminjaman.php
├── simpan-peminjaman.php
├── update-status-peminjaman.php
└── README.md

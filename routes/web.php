<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\TampilanController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EventController;



Auth::routes();

// Rute login admin
Route::get('/admin-login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin-login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Admin Register Routes
Route::get('/admin-register', [RegisterController::class, 'showRegistrationForm'])
    ->middleware('check.admin.register')
    ->name('admin.register');

Route::post('/admin-register', [RegisterController::class, 'register'])
    ->middleware('check.admin.register');

// Admin Dashboard Protected by Role
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
});

// Pengajuan
Route::get('/pengajuan', [AdminController::class, 'index'])->name('admin.pengajuan');
Route::prefix('/pengajuan')->group(function () {
    Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('admin.pengajuan.edit');
    Route::put('/update/{id}', [AdminController::class, 'update'])->name('admin.pengajuan.update');
    Route::delete('/delete/{id}', [AdminController::class, 'destroy'])->name('admin.pengajuan.destroy');
});

Route::get('/', [TampilanController::class, 'index'])->name('index');
Route::get('/about', [TampilanController::class, 'about'])->name('about');
Route::get('/informasi', [TampilanController::class, 'informasi'])->name('informasi');
Route::get('/layanan', [TampilanController::class, 'layanan'])->name('layanan');
Route::get('/status-peminjaman', [TampilanController::class, 'statusPeminjaman'])->name('status-peminjaman');
Route::get('/konfirmasi/{pengajuan}', [PengajuanController::class, 'konfirmasi'])->name('konfirmasi');

// Rute untuk menampilkan halaman dashboard admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

// Rute untuk menyetujui pengajuan
Route::post('/admin/approve/{id}', [AdminController::class, 'approve'])->name('admin.approve');

// Rute untuk menolak pengajuan
Route::post('/admin/reject/{id}', [AdminController::class, 'reject'])->name('admin.reject');

Route::post('/pengajuan', [PengajuanController::class, 'submit'])->name('pengajuan.submit');


Route::post('/pengajuan', [LayananController::class, 'store'])->name('pengajuan.store');


Route::get('/konfirmasi-peminjaman/{id}', [LayananController::class, 'konfirmasiPeminjaman'])->name('konfirmasi.peminjaman');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route untuk EventController
Route::get('/get-events', [EventController::class, 'getEvents'])->name('events.get'); // Mendapatkan semua event untuk kalender
Route::post('/pengajuan/store', [EventController::class, 'store'])->name('pengajuan.store'); // Menyimpan pengajuan baru


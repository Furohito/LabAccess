<?php

use App\Http\Controllers\HalamanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TampilanController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\AdminController;

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

use App\Http\Controllers\LayananController;

Route::post('/pengajuan', [LayananController::class, 'store'])->name('pengajuan.store');


Route::get('/konfirmasi-peminjaman/{id}', [LayananController::class, 'konfirmasiPeminjaman'])->name('konfirmasi.peminjaman');

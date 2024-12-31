<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;

class TampilanController extends Controller
{
    // Halaman Index
    public function index()
    {
        return view('index');
    }

    // Halaman About
    public function about()
    {
        return view('about');
    }

    // Halaman Informasi
    public function informasi()
    {
        return view('informasi');
    }

    // Halaman Layanan
    public function layanan()
    {
        return view('layanan');
    }

    // Halaman Status Peminjaman
    public function statusPeminjaman()
    {
        $pengajuan = Pengajuan::orderBy('tanggal', 'asc')
                            ->orderBy('waktuMulai', 'asc')
                            ->get();
        return view('status-peminjaman', compact('pengajuan'));
    }


}

<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;

class StatusPeminjamanController extends Controller
{
    public function index()
    {
        // Mengambil semua pengajuan dari database
        $pengajuan = Pengajuan::all();
        return view('status-peminjaman', compact('pengajuan'));
    }
}

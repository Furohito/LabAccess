<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;
use App\Mail\PengajuanStatusMail;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    // Menampilkan dashboard admin dengan daftar pengajuan
    public function index()
    {
        // Ambil semua pengajuan dari database
        $pengajuan = Pengajuan::all(); // Ambil semua data pengajuan
        return view('admin.dashboard', compact('pengajuan')); // Kirim data pengajuan ke view
    }

    // Menyetujui pengajuan
    public function approve($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->status = 'approved'; // Ubah status pengajuan menjadi approved
        $pengajuan->save();

        // Kirim email konfirmasi ke pengguna
        Mail::to($pengajuan->email)->send(new PengajuanStatusMail($pengajuan, 'disetujui'));

        return back()->with('success', 'Pengajuan disetujui!');
    }

    // Menolak pengajuan
    public function reject($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->status = 'rejected'; // Ubah status pengajuan menjadi rejected
        $pengajuan->save();

        // Kirim email konfirmasi ke pengguna
        Mail::to($pengajuan->email)->send(new PengajuanStatusMail($pengajuan, 'ditolak'));

        return back()->with('error', 'Pengajuan ditolak!');
    }
}

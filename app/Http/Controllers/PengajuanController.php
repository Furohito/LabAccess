<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\PengajuanNotifikasiMail;

class PengajuanController extends Controller
{
    public function submit(Request $request)
    {
        // Validasi data yang diterima
        $validated = $request->validate([
            'email' => 'required|email',
            'nama' => 'required|string',
            'tanggal' => 'required|date',
            'fasilitas' => 'required|string',
        ]);

        // Simpan data pengajuan
        $pengajuan = Pengajuan::create([
            'email' => $validated['email'],
            'nama' => $validated['nama'],
            'tanggal' => $validated['tanggal'],
            'fasilitas' => $validated['fasilitas'],
            'status' => 'pending', // Status awalnya 'pending'
        ]);

        // Kirim email notifikasi ke pengguna
        Mail::to($validated['email'])->send(new PengajuanNotifikasiMail($pengajuan));

        // Redirect atau beri respons
        return back()->with('success', 'Pengajuan berhasil dikirim! Silakan cek email untuk konfirmasi.');
    }

    public function konfirmasi($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->status = 'confirmed'; // Mengubah status pengajuan menjadi confirmed
        $pengajuan->save();

        return redirect()->route('status-peminjaman')->with('success', 'Pengajuan Anda telah dikonfirmasi!');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;
use App\Mail\PengajuanStatusMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class LayananController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Validate data input
            $validatedData = $request->validate([
                'nama' => 'required|string|max:255',
                'email' => 'required|email',
                'tanggal' => 'required|date',
                'waktuMulai' => 'required|date_format:H:i',
                'waktuSelesai' => 'required|date_format:H:i',
                'prasarana' => 'required|string',
                'jumlahPeserta' => 'required|integer',
                'fasilitas' => 'required|string',
                'keterangan' => 'nullable|string',
                'statusPengaju' => 'required|string',
                'nikNim' => 'required|string|max:20',
                'noWhatsapp' => 'required|string|max:15',
                'penanggungJawab' => 'required|string|max:255',
            ]);

            // Store the data
            $pengajuan = Pengajuan::create([
                'nama' => $validatedData['nama'],
                'email' => $validatedData['email'],
                'tanggal' => $validatedData['tanggal'],
                'waktuMulai' => $validatedData['waktuMulai'],
                'waktuSelesai' => $validatedData['waktuSelesai'],
                'prasarana' => $validatedData['prasarana'],
                'jumlahPeserta' => $validatedData['jumlahPeserta'],
                'fasilitas' => $validatedData['fasilitas'],
                'keterangan' => $validatedData['keterangan'],
                'statusPengaju' => $validatedData['statusPengaju'],
                'nikNim' => $validatedData['nikNim'],
                'noWhatsapp' => $validatedData['noWhatsapp'],
                'penanggungJawab' => $validatedData['penanggungJawab'],
                'status' => 'pending',
            ]);

            // Send email to the user (optional)
            try {
                Mail::to($request->email)->send(new PengajuanStatusMail($pengajuan, $request->statusPengaju));
            } catch (\Exception $e) {
                // Log email error
                Log::error('Email error: ' . $e->getMessage());
            }

            // Flash success message
            return redirect()->route('status-peminjaman')->with('success', 'Pengajuan berhasil diajukan.');
        } catch (\Exception $e) {
            // Flash error message
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}

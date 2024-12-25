<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Mail\PengajuanStatusMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LayananController extends Controller
{
    public function store(Request $request)
    {
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
    
        // Debugging step: Check if the data is being validated correctly
        dd($validatedData);  // You can remove this later after confirming data
    
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
        ]);
    
        // Send email to the user after the pengajuan is saved
        try {
            Mail::to($request->email)->send(new PengajuanStatusMail($pengajuan, $request->statusPengaju));
        } catch (\Exception $e) {
            // Handle any mail sending exceptions
            return back()->with('error', 'Email gagal dikirim: ' . $e->getMessage());
        }
    
        // Redirect the user to the status page with a success message
        return redirect()->route('status-peminjaman')->with('success', 'Pengajuan berhasil');
    }
    
}

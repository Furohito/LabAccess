<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;

class EventController extends Controller
{
    /**
     * Mendapatkan semua event untuk kalender.
     */
    public function getEvents()
    {
        try {
            $pengajuans = Pengajuan::all(); // Ambil semua pengajuan dari database
            $events = [];

            foreach ($pengajuans as $pengajuan) {
                // Abaikan pengajuan dengan status 'ditolak'
                if ($pengajuan->status === 'ditolak') {
                    continue;
                }

                // Tentukan warna berdasarkan status
                $color = match ($pengajuan->status) {
                    'disetujui' => 'green', // Hijau untuk disetujui
                    'pending' => 'blue', // Biru untuk pending
                    default => 'gray', // Warna default (opsional)
                };

                $events[] = [
                    'title' => $pengajuan->nama,
                    'start' => $pengajuan->tanggal,
                    'color' => $color, // Tambahkan warna event
                    'extendedProps' => [
                        'email' => $pengajuan->email,
                        'waktuMulai' => $pengajuan->waktuMulai,
                        'waktuSelesai' => $pengajuan->waktuSelesai,
                        'prasarana' => $pengajuan->prasarana,
                    ],
                ];
            }

            return response()->json($events, 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mendapatkan data event.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Menyimpan pengajuan baru dan mengarahkan ke halaman Status Peminjaman.
     */
    public function store(Request $request)
    {
        try {
            // Validasi data yang dikirim melalui form
            $validated = $request->validate([
                'nama' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'tanggal' => 'required|date',
                'waktuMulai' => 'required|date_format:H:i',
                'waktuSelesai' => 'required|date_format:H:i',
                'prasarana' => 'required|string|max:255',
                'jumlahPeserta' => 'required|integer|min:1',
                'fasilitas' => 'required|string|max:255',
                'keterangan' => 'nullable|string|max:500',
                'statusPengaju' => 'required|string|max:255',
                'nikNim' => 'required|string|max:50',
                'noWhatsapp' => 'required|string|max:20',
                'penanggungJawab' => 'required|string|max:255',
            ]);

            // Simpan data ke database
            Pengajuan::create(array_merge($validated, [
                'status' => 'pending', // Set status default sebagai 'pending'
            ]));

            // Redirect ke halaman Status Peminjaman
            return redirect()->route('status-peminjaman')->with('success', 'Pengajuan berhasil disimpan! Anda sekarang berada di halaman Status Peminjaman.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Jika validasi gagal, kembalikan pesan error
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            // Jika terjadi error lain, kembalikan pesan error umum
            return redirect()->back()->with('error', 'Terjadi kesalahan pada server. Silakan coba lagi.');
        }
    }
}

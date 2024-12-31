<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;
use App\Mail\PengajuanStatusMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    // Menampilkan dashboard admin dengan daftar pengajuan
    public function dashboard()
    {
        // Total pengajuan
        $pengajuanCount = DB::table('pengajuan')->count();

        // Data untuk Chart.js berdasarkan tanggal
        $chartData = [
            'labels' => DB::table('pengajuan')
                ->selectRaw('tanggal')
                ->groupBy('tanggal')
                ->orderBy('tanggal')
                ->pluck('tanggal')
                ->map(fn($date) => date('Y-m-d', strtotime($date))), // Format tanggal
            'data' => DB::table('pengajuan')
                ->selectRaw('tanggal, COUNT(*) as total')
                ->groupBy('tanggal')
                ->orderBy('tanggal')
                ->pluck('total'),
        ];

        // Hari dengan peminjaman terbanyak
        $mostFrequentDay = DB::table('pengajuan')
            ->selectRaw('DAYNAME(tanggal) as day, COUNT(*) as total')
            ->groupBy('day')
            ->orderByDesc('total')
            ->first();

        // Hari dengan peminjaman tersedikit
        $leastFrequentDay = DB::table('pengajuan')
            ->selectRaw('DAYNAME(tanggal) as day, COUNT(*) as total')
            ->groupBy('day')
            ->orderBy('total')
            ->first();

        return view('admin.dashboard', compact(
            'pengajuanCount',
            'chartData',
            'mostFrequentDay',
            'leastFrequentDay'
        ));
    }

    // Menampilkan daftar pengajuan
    public function index()
    {
        $pengajuans = Pengajuan::all();
        return view('admin.pengajuan', compact('pengajuans'));
    }

    // Menampilkan halaman edit
    public function edit($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        return view('pengajuan.edit', compact('pengajuan'));
    }

    // Memperbarui data pengajuan
    public function update(Request $request, $id)
    {
        try {
            // Temukan data pengajuan
            $pengajuan = Pengajuan::findOrFail($id);

            // Validasi input
            $request->validate([
                'status' => 'required|in:Disetujui,Pending,Ditolak',
            ]);

            // Perbarui status pengajuan
            $pengajuan->update([
                'status' => $request->status,
            ]);

            // Redirect dengan pesan sukses
            return redirect()->route('admin.pengajuan')
                ->with('success', 'Status pengajuan berhasil diperbarui.');
        } catch (\Exception $e) {
            // Redirect dengan pesan error
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    // Menghapus data pengajuan
    public function destroy($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->delete();

        return redirect()->route('admin.pengajuan')
            ->with('success', 'Pengajuan berhasil dihapus.');
    }
}

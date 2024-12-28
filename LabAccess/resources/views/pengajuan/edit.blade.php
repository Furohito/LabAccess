@extends('layouts.admin')

@section('title', 'Edit Pengajuan')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card border-0 shadow-sm" style="background-color: #f8f9fa;">
                <div class="card-header text-white" style="background-color: #562ED9;">
                    <h3 class="mb-0">Edit Status Pengajuan</h3>
                </div>
                <div class="card-body">
                    <!-- Detail Informasi Pengajuan -->
                    <div class="mb-4">
                        <h5 class="fw-bold">Detail Pengajuan</h5>
                        <p><strong>Nama:</strong> {{ $pengajuan->nama }}</p>
                        <p><strong>Email:</strong> {{ $pengajuan->email }}</p>
                        <p><strong>Tanggal:</strong> {{ $pengajuan->tanggal }}</p>
                        <p><strong>Waktu Mulai:</strong> {{ $pengajuan->waktuMulai }}</p>
                        <p><strong>Waktu Selesai:</strong> {{ $pengajuan->waktuSelesai }}</p>
                        <p><strong>Prasarana:</strong> {{ $pengajuan->prasarana }}</p>
                        <p><strong>Jumlah Peserta:</strong> {{ $pengajuan->jumlahPeserta }}</p>
                        <p><strong>Fasilitas:</strong> {{ $pengajuan->fasilitas }}</p>
                        <p><strong>Keterangan:</strong> {{ $pengajuan->keterangan ?? '-' }}</p>
                        <p><strong>Status Pengaju:</strong> {{ $pengajuan->statusPengaju }}</p>
                        <p><strong>Penanggung Jawab:</strong> {{ $pengajuan->penanggungJawab }}</p>
                    </div>

                    <!-- Form Update Status -->
                    <form action="{{ route('admin.pengajuan.update', $pengajuan->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="status" class="form-label fw-bold">Status Pengajuan</label>
                            <select name="status" id="status" class="form-select" style="border: 1px solid #562ED9;">
                                <option value="Pending" {{ $pengajuan->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Disetujui" {{ $pengajuan->status == 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
                                <option value="Ditolak" {{ $pengajuan->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                            </select>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn text-white me-2" style="background-color: #562ED9;">Update Status</button>
                            <a href="{{ route('admin.pengajuan') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

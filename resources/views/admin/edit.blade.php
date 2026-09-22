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
                    <form action="{{ route('admin.pengajuan.update', $pengajuan->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="statusPengaju" class="form-label fw-bold">Status Pengajuan</label>
                            <select name="statusPengaju" id="statusPengaju" class="form-select" style="border: 1px solid #562ED9;">
                                <option value="Pending" {{ $pengajuan->statusPengaju == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Disetujui" {{ $pengajuan->statusPengaju == 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
                                <option value="Ditolak" {{ $pengajuan->statusPengaju == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                            </select>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn text-white me-2" style="background-color: #562ED9;">Update Status</button>
                            <a href="{{ route('admin.pengajuan.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

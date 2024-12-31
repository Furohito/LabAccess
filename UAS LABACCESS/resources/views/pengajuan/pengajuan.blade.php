@extends('layouts.admin')

@section('title', 'Daftar Pengajuan')

@section('content')
<!-- Custom CSS -->
<style>
    /* Dropdown Styling for DataTables */
    .dataTables_length select {
        width: auto !important;
        height: 38px !important;
        padding: 0.375rem 0.75rem;
        border-radius: 0.25rem;
        border: 1px solid #ced4da;
        background-color: #fff;
        color: #495057;
        font-size: 0.875rem;
        line-height: 1.5;
        appearance: none;
    }

    .dataTables_wrapper .dataTables_length label {
        font-weight: 500;
        color: #495057;
        margin-bottom: 0;
        display: flex;
        align-items: center;
    }

    .dataTables_length label select {
        margin-left: 5px;
    }

    /* Pagination Styling */
    .dataTables_paginate .pagination {
        justify-content: flex-end;
        margin-top: 10px;
    }

    .dataTables_wrapper .dataTables_filter label {
        font-weight: 500;
        color: #495057;
        display: flex;
        align-items: center;
    }
</style>
<div class="container-fluid mt-4">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="fw-bold" style="color: #562ED9;">Daftar Pengajuan</h1>
            <p style="color: #7E7E7E;">Kelola data pengajuan dengan efisiensi dan kemudahan</p>
        </div>
    </div>

    <!-- Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle text-center" id="pengajuanTable">
            <thead style="background-color: #562ED9; color: white;">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengajuans as $key => $pengajuan)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td class="text-start ps-4">{{ $pengajuan->nama }}</td>
                        <td class="text-start ps-4">{{ $pengajuan->email }}</td>
                        <td>
                            @if ($pengajuan->statusPengaju == 'Disetujui')
                                <span class="badge bg-success text-white">{{ $pengajuan->statusPengaju }}</span>
                            @elseif ($pengajuan->statusPengaju == 'Pending')
                                <span class="badge bg-warning text-white">{{ $pengajuan->statusPengaju }}</span>
                            @else
                                <span class="badge bg-danger text-white">{{ $pengajuan->statusPengaju }}</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.pengajuan.edit', $pengajuan->id) }}" class="btn btn-sm" style="background-color: #562ED9; color: white;">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('admin.pengajuan.destroy', $pengajuan->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pengajuan ini?')">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

<!-- Font Awesome for Icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<!-- DataTables JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#pengajuanTable').DataTable({
            "language": {
                "search": "Cari:",
                "lengthMenu": "Tampilkan _MENU_ entri per halaman",
                "info": "Menampilkan _START_ hingga _END_ dari total _TOTAL_ entri",
                "paginate": {
                    "first": "Awal",
                    "last": "Akhir",
                    "next": "Berikutnya",
                    "previous": "Sebelumnya"
                }
            },
            "dom": '<"d-flex justify-content-between align-items-center"lf>t<"d-flex justify-content-between align-items-center"ip>',
            "pageLength": 10, // Default jumlah data per halaman
        });
    });
</script>
@endsection

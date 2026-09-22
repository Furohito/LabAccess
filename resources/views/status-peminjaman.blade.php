@extends('layouts.main')

@section('title', 'Status Peminjaman')

@section('content')
<link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<style>
    /* General Styles */
    body {
        transition: background-color 0.5s ease, color 0.5s ease;
    }

    .table {
        transition: background-color 0.5s ease, color 0.5s ease;
    }

    .badge {
        border-radius: 10px;
        padding: 0.5em 0.8em;
    }

    /* Light Mode */
    body.light-mode {
        background-color: #ffffff;
        color: #000000;
    }

    body.light-mode .table thead {
        background: linear-gradient(90deg, #007bff, #0056b3);
        color: white;
    }

    body.light-mode .table {
        background-color: #ffffff;
        color: #000000;
        border: 1px solid #dee2e6;
    }

    body.light-mode .table tbody tr:hover {
        background-color: #f8f9fa;
    }

    /* Dark Mode */
    body.dark-mode {
        background-color: #121212;
        color: #ffffff;
    }

    body.dark-mode .table thead {
        background: linear-gradient(90deg, #3a3a3a, #1e1e1e);
        color: #ffffff;
    }

    body.dark-mode .table {
        background-color: #1e1e1e;
        color: #ffffff;
        border: 1px solid #444444;
    }

    body.dark-mode .table tbody tr:hover {
        background-color: #2b2b2b;
    }

    /* Badge Styles (Unchanged by Mode) */
    .badge.bg-gradient-success {
        background: #28a745;
        color: #ffffff;
    }

    .badge.bg-gradient-warning {
        background: #ffc107;
        color: #ffffff;
    }

    .badge.bg-gradient-danger {
        background: #dc3545;
        color: #ffffff;
    }
    /* Pop-in Animation */
    @keyframes popIn {
        0% {
            opacity: 0;
            transform: translateY(30px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .pop-in {
        animation: popIn 0.6s ease-out;
    }

    /* Apply Pop-in Animation to Status and Table Peminjaman */
    #status, #tabel-peminjaman {
        animation: popIn 0.6s ease-out;
    }
</style>

<div id="status" class="status py-5">
    <div class="container">
    <div class="container section-title pop-in">
            <h2>Status Peminjaman</h2>
            <p>Lihat Informasi Detail Mengenai Peminjaman Anda</p>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle text-center" id="tabel-peminjaman">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pengaju</th>
                        <th>Prasarana</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Status</th>
                        <th>NIDN / NIM</th>
                        <th>No Whatsapp</th>
                        <th>Penanggung Jawab</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengajuan as $key => $p)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->prasarana }}</td>
                        <td>{{ \Carbon\Carbon::parse($p->tanggal)->format('d M Y') }}</td>
                        <td>{{ $p->waktuMulai }} - {{ $p->waktuSelesai }}</td>
                        <td>
                            @if ($p->status == 'disetujui')
                                <span class="badge bg-gradient-success">✔ Disetujui</span>
                            @elseif ($p->status == 'pending')
                                <span class="badge bg-gradient-warning">⌛ Pending</span>
                            @else
                                <span class="badge bg-gradient-danger">✖ Ditolak</span>
                            @endif
                        </td>
                        <td>{{ $p->nikNim }}</td>
                        <td>{{ $p->noWhatsapp }}</td>
                        <td>{{ $p->penanggungJawab }}</td>
                        <td>{{ $p->keterangan ?? '-' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function () {
        // Initialize DataTables
        $('#tabel-peminjaman').DataTable({
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
            "dom": '<"d-flex justify-content-between align-items-center"<"d-flex align-items-center"l><"d-flex align-items-center"f>>t<"d-flex justify-content-between align-items-center"<"info-left"i><"pagination-right"p>>',
            "pageLength": 10
        });

        // Dark and Light Mode Logic
        const applyDarkMode = () => {
            document.body.classList.add('dark-mode');
            document.body.classList.remove('light-mode');
        };

        const applyLightMode = () => {
            document.body.classList.add('light-mode');
            document.body.classList.remove('dark-mode');
        };
    });

</script>
@endsection

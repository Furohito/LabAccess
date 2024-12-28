@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid mt-4">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="fw-bold" style="color: #562ED9;">Dashboard</h1>
            <p style="color: #7E7E7E;">Lihat statistik terkini dari sistem Anda</p>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row">
        <div class="col-md-4">
            <div class="card border-0 mb-4" style="background-color: #562ED9;">
                <div class="card-body d-flex align-items-center">
                    <div class="icon-container text-white rounded-circle me-3" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; background-color: rgba(255, 255, 255, 0.2);">
                        <i class="fas fa-list-alt fa-lg"></i>
                    </div>
                    <div>
                        <h5 class="card-title text-white">Total Pengajuan</h5>
                        <h2 class="fw-bold text-white">{{ $pengajuanCount }}</h2>
                        <p class="text-white-50 small">Jumlah pengajuan dalam sistem</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 mb-4" style="background-color: #28a745;">
                <div class="card-body d-flex align-items-center">
                    <div class="icon-container text-white rounded-circle me-3" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; background-color: rgba(255, 255, 255, 0.2);">
                        <i class="fas fa-calendar-day fa-lg"></i>
                    </div>
                    <div>
                        <h5 class="card-title text-white">Peminjaman Terbanyak</h5>
                        @if($mostFrequentDay)
                            <h2 class="fw-bold text-white">{{ $mostFrequentDay->day }}</h2>
                            <p class="text-white-50 small">Jumlah: {{ $mostFrequentDay->total }}</p>
                        @else
                            <h2 class="fw-bold text-white-50">Tidak Ada Data</h2>
                            <p class="text-white-50 small">Belum ada peminjaman tercatat</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 mb-4" style="background-color: #dc3545;">
                <div class="card-body d-flex align-items-center">
                    <div class="icon-container text-white rounded-circle me-3" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; background-color: rgba(255, 255, 255, 0.2);">
                        <i class="fas fa-calendar-minus fa-lg"></i>
                    </div>
                    <div>
                        <h5 class="card-title text-white">Peminjaman Tersedikit</h5>
                        @if($leastFrequentDay)
                            <h2 class="fw-bold text-white">{{ $leastFrequentDay->day }}</h2>
                            <p class="text-white-50 small">Jumlah: {{ $leastFrequentDay->total }}</p>
                        @else
                            <h2 class="fw-bold text-white-50">Tidak Ada Data</h2>
                            <p class="text-white-50 small">Belum ada peminjaman tercatat</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart Section -->
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0" style="background-color: #f8f9fa;">
                <div class="card-header border-0" style="background-color: #562ED9; color: white;">
                    <h5 class="card-title mb-0">Pengajuan per Tanggal</h5>
                </div>
                <div class="card-body">
                    <canvas id="pengajuanChart" height="100"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js Script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const labels = {!! json_encode($chartData['labels']) !!};
    const data = {!! json_encode($chartData['data']) !!};

    const ctx = document.getElementById('pengajuanChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Jumlah Pengajuan',
                data: data,
                borderColor: '#562ED9',
                backgroundColor: 'rgba(86, 46, 217, 0.1)',
                tension: 0.4,
                borderWidth: 3,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    labels: {
                        font: {
                            size: 14,
                        },
                        color: '#495057',
                    }
                }
            },
            scales: {
                x: {
                    grid: {
                        color: 'rgba(200, 200, 200, 0.3)',
                    },
                    ticks: {
                        font: {
                            size: 12,
                        }
                    }
                },
                y: {
                    grid: {
                        color: 'rgba(200, 200, 200, 0.3)',
                    },
                    ticks: {
                        font: {
                            size: 12,
                        }
                    }
                }
            }
        }
    });
</script>
@endsection

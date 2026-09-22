<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi untuk membuat tabel pengajuan.
     */
    public function up()
    {
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('nama'); // Kolom untuk nama pengaju
            $table->string('email')->index(); // Email dengan indeks untuk pencarian cepat
            $table->date('tanggal')->index(); // Tanggal dengan indeks untuk pencarian cepat
            $table->time('waktuMulai'); // Waktu mulai
            $table->time('waktuSelesai'); // Waktu selesai
            $table->string('prasarana'); // Nama prasarana
            $table->integer('jumlahPeserta'); // Jumlah peserta
            $table->string('fasilitas'); // Fasilitas yang digunakan
            $table->string('keterangan')->nullable()->default('Tidak ada keterangan'); // Keterangan (opsional, default)
            $table->string('statusPengaju'); // Status pengaju (mahasiswa, dosen, dll.)
            $table->string('nikNim'); // NIK atau NIM
            $table->string('noWhatsapp'); // Nomor WhatsApp pengaju
            $table->string('penanggungJawab'); // Penanggung jawab kegiatan
            $table->enum('status', ['pending', 'ditolak', 'disetujui'])->default('pending'); // Status dengan default 'pending'
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Membatalkan migrasi dan menghapus tabel pengajuan.
     */
    public function down()
    {
        Schema::dropIfExists('pengajuan');
    }
};

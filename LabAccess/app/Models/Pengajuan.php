<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    // Nama tabel jika tidak sesuai dengan nama model
    protected $table = 'pengajuan';

    // Kolom yang bisa diisi
    protected $fillable = [
        'nama', 'email', 'tanggal', 'waktuMulai', 'waktuSelesai', 'prasarana',
        'jumlahPeserta', 'fasilitas', 'keterangan', 'statusPengaju', 'nikNim',
        'noWhatsapp', 'penanggungJawab', 'status'
    ];


}

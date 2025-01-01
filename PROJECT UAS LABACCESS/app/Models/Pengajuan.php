<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    // Nama tabel jika tidak sesuai dengan nama model
    protected $table = 'pengajuan';

    // Kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'nama',
        'email',
        'tanggal',
        'waktuMulai',
        'waktuSelesai',
        'prasarana',
        'jumlahPeserta',
        'fasilitas',
        'keterangan',
        'statusPengaju',
        'nikNim',
        'noWhatsapp',
        'penanggungJawab',
        'status', // Kolom status pengajuan
    ];

    // Default values untuk atribut tertentu
    protected $attributes = [
        'status' => 'pending', // Status default saat pengajuan baru dibuat
    ];

    /**
     * Mutator untuk format tanggal ke format Y-m-d.
     *
     * @param  string  $value
     */
    public function setTanggalAttribute($value)
    {
        $this->attributes['tanggal'] = date('Y-m-d', strtotime($value));
    }

    /**
     * Mutator untuk menyimpan waktu mulai dalam format H:i:s.
     *
     * @param  string  $value
     */
    public function setWaktuMulaiAttribute($value)
    {
        $this->attributes['waktuMulai'] = date('H:i:s', strtotime($value));
    }

    /**
     * Mutator untuk menyimpan waktu selesai dalam format H:i:s.
     *
     * @param  string  $value
     */
    public function setWaktuSelesaiAttribute($value)
    {
        $this->attributes['waktuSelesai'] = date('H:i:s', strtotime($value));
    }

    /**
     * Accessor untuk mendapatkan deskripsi status pengajuan.
     *
     * @return string
     */
    public function getStatusDeskripsiAttribute()
    {
        switch ($this->attributes['status']) {
            case 'pending':
                return 'Pengajuan Anda sedang dalam proses persetujuan.';
            case 'disetujui':
                return 'Pengajuan Anda telah disetujui.';
            case 'ditolak':
                return 'Pengajuan Anda ditolak.';
            default:
                return 'Status tidak diketahui.';
        }
    }

    /**
     * Scope untuk memfilter pengajuan berdasarkan status.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $status
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilterByStatus($query, $status)
    {
        return $query->where('status', $status);
    }
}

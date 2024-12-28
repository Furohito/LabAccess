<?php

namespace App\Mail;

use App\Models\Pengajuan;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PengajuanStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pengajuan;
    public $status;
    public $url; // Menambahkan URL konfirmasi

    public function __construct($pengajuan)
    {
        $this->pengajuan = $pengajuan;
    }
    
    public function build()
    {
        return $this->view('emails.pengajuan_status')
                    ->with([
                        'url' => route('konfirmasi.peminjaman', ['id' => $this->pengajuan->id]),
                        'pengajuan' => $this->pengajuan
                    ]);
    }
    
}

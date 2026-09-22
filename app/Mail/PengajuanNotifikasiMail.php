<?php

namespace App\Mail;

use App\Models\Pengajuan;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PengajuanNotifikasiMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pengajuan;

    public function __construct(Pengajuan $pengajuan)
    {
        $this->pengajuan = $pengajuan;
    }

    public function build()
    {
        return $this->view('emails.pengajuan_notifikasi')
                    ->with([
                        'url' => route('konfirmasi', ['pengajuan' => $this->pengajuan->id]),
                    ]);
    }
}

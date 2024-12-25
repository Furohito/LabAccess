<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->date('tanggal');
            $table->time('waktuMulai');
            $table->time('waktuSelesai');
            $table->string('prasarana');
            $table->integer('jumlahPeserta');
            $table->string('fasilitas');
            $table->string('keterangan')->nullable();
            $table->string('statusPengaju');
            $table->string('nikNim');
            $table->string('noWhatsapp');
            $table->string('penanggungJawab');
            $table->timestamps();
        });
    }
    

};

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
        Schema::table('pengajuan', function (Blueprint $table) {
            $table->string('nama');
        });
    }
    
    public function down()
    {
        Schema::table('pengajuan', function (Blueprint $table) {
            $table->dropColumn('nama');
        });
    }
    
};

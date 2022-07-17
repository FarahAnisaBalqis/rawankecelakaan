<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColInTableHalamanData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('halaman_data', function (Blueprint $table) {
            $table->string('no_laporan');
            $table->string('waktu');
            $table->string('deskripsi_lokasi');
            $table->string('sifat_kasus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('halaman_data', function (Blueprint $table) {
            //
        });
    }
}

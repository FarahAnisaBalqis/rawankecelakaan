<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKorbansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('korbans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('halaman_data_id')->constrained()->references('id')->on('halaman_data');
            $table->string('nama');
            $table->string('umur');
            $table->string('alamat');
            $table->string('sifat_cidera');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('korbans');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('absensi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_mhs')->unsigned();
            $table->integer('id_jadwal')->unsigned();
            $table->foreign('id_mhs')->references('id')->on('mahasiswa');
            $table->foreign('id_jadwal')->references('id')->on('jadwal');
            $table->string('status');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi');
    }
};

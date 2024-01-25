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
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kelas');
            $table->unsignedBigInteger('id_matkul');
            $table->unsignedBigInteger('id_tahunajar');
            $table->unsignedBigInteger('id_dosen');
            $table->foreign('id_dosen')->references('id')->on('dosen');
            $table->foreign('id_kelas')->references('id')->on('kelas');
            $table->foreign('id_matkul')->references('id')->on('matakuliah');
            $table->foreign('id_tahunajar')->references('id')->on('tahun_ajar');
            $table->string('ruang',25);
            $table->dateTime('hari');
            $table->dateTime('tanggal');
            $table->dateTime('jam_mulai');
            $table->dateTime('jam_akhir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};

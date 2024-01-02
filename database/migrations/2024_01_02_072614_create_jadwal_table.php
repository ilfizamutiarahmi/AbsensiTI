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
            $table->increments('id');
            $table->integer('id_kelas')->unsigned();
            $table->integer('id_matkul')->unsigned();
            $table->integer('id_tahunajar')->unsigned();
            $table->unsignedBigInteger('id_dosen');
            $table->integer('id_prodi')->unsigned();
            $table->foreign('id_kelas')->references('id')->on('kelas')->onDelete('cascade');
            $table->foreign('id_matkul')->references('id')->on('matakuliah')->onDelete('cascade');
            $table->foreign('id_tahunajar')->references('id')->on('tahun_ajar')->onDelete('cascade');
            $table->foreign('id_dosen')->references('id')->on('dosen')->onDelete('cascade');
            $table->foreign('id_prodi')->references('id')->on('prodi')->onDelete('cascade');
            $table->string('ruang',25);
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

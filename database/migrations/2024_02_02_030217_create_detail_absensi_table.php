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
        Schema::create('detail_absensi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_absensi');
            $table->foreign('id_absensi')->references('id')->on('absensi');
            $table->unsignedBigInteger('id_mhs');
            $table->foreign('id_mhs')->references('id')->on('mahasiswa');
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
        Schema::dropIfExists('detail_absensi');
    }
};

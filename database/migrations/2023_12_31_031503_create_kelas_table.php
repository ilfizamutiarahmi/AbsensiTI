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
        Schema::create('kelas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_kelas',25);
            $table->unsignedBigInteger('id_prodi');
            $table->string('nama_pa',25);
            $table->timestamps();
        });

        Schema::table('prodi', function (Blueprint $table) {
            $table->foreign('id_prodi')->references('id')->on('prodi')->onUpdate('cascade')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};

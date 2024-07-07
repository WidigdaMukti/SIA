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
        Schema::create('absensi_siswas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nik_siswa')->nullable();
            $table->unsignedBigInteger('id_mapel_kelas')->nullable();
            // $table->date('tanggal')->nullable();
            // $table->boolean('status_kehadiran')->nullable();
            $table->timestamps();

            $table->foreign('nik_siswa')->references('nik_siswa')->on('siswas')->onUpdate('cascade');
            $table->foreign('id_mapel_kelas')->references('id')->on('mapel_kelas')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi_siswas');
    }
};

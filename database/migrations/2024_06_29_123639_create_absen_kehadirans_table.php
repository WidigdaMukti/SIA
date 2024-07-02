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
        Schema::create('absen_kehadirans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_absensi_siswa')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();

            $table->foreign('id_absensi_siswa')->references('id')->on('absensi_siswas')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absen_kehadirans');
    }
};

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
            $table->id();
            $table->unsignedBigInteger('nik_guru');
            // $table->unsignedBigInteger('id_tahun_akademik');
            $table->string('semester');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('tingkat_kelas');
            $table->boolean('status')->default(1);
            $table->timestamps();

            $table->foreign('nik_guru')->references('nik_guru')->on('admin_gurus')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreign('id_tahun_akademik')->references('id')->on('tahun_akademiks')->onUpdate('cascade')->onDelete('cascade');
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

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
        Schema::create('raport_siswas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nik_siswa')->nullable();
            // $table->unsignedBigInteger('id_mapel_raport')->nullable();
            // $table->unsignedBigInteger('id_ekskul_raport')->nullable();
            $table->integer('sakit')->nullable();
            $table->integer('izin')->nullable();
            $table->integer('tanpa_keterangan')->nullable();
            $table->text('catatan_wali_kelas')->nullable();
            $table->timestamps();

            $table->foreign('nik_siswa')->references('nik_siswa')->on('siswas')->onUpdate('cascade');
            // $table->foreign('id_mapel_raport')->references('id')->on('mapel_raports')->onUpdate('cascade')->onDelete('set null');
            // $table->foreign('id_ekskul_raport')->references('id')->on('ekskul_raports')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('raport_siswas');
    }
};

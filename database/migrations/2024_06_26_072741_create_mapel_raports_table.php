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
        Schema::create('mapel_raports', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('id_mapel_kelas_nilai')->nullable();
            $table->unsignedBigInteger('raport_siswa_id')->nullable();
            $table->string('nama_mapel')->nullable();
            $table->integer('kkm')->nullable();
            $table->integer('nilai_akhir')->nullable();
            $table->text('capaian_kompetensi')->nullable();
            $table->timestamps();

            // $table->foreign('id_mapel_kelas_nilai')->references('id')->on('nilais')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('raport_siswa_id')->references('id')->on('raport_siswas')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mapel_raports');
    }
};

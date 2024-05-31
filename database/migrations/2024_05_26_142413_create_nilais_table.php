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
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nik_siswa');
            $table->unsignedBigInteger('id_mapel_kelas');
            $table->integer('kkm')->nullable();
            $table->integer('nilai_uh1')->nullable();
            $table->integer('nilai_uh2')->nullable();
            $table->integer('nilai_uh3')->nullable();
            $table->integer('nilai_tgs_1')->nullable();
            $table->integer('nilai_tgs_2')->nullable();
            $table->integer('nilai_tgs_3')->nullable();
            $table->integer('nilai_uts')->nullable();
            $table->integer('nilai_uas')->nullable();
            $table->integer('rata_rata')->nullable();
            $table->timestamps();

            $table->foreign('nik_siswa')->references('nik_siswa')->on('siswas')->onDelete('cascade');
            $table->foreign('id_mapel_kelas')->references('id')->on('mapel_kelas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilais');
    }
};

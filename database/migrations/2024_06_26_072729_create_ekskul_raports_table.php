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
        Schema::create('ekskul_raports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('raport_siswa_id')->nullable();
            $table->string('nama')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('raport_siswa_id')->references('id')->on('raport_siswas')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ekskul_raports');
    }
};

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
            $table->unsignedBigInteger('nik_guru')->nullable();
            // $table->unsignedBigInteger('id_mapel_kelas')->nullable();
            $table->string('semester')->nullable();
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_selesai')->nullable();
            $table->string('tingkat_kelas')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();

            $table->foreign('nik_guru')->references('nik_guru')->on('admin_gurus')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreign('id_mapel_kelas')->references('id')->on('mapel_kelas')->onUpdate('cascade')->onDelete('set null');
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

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
        Schema::create('jadwal_mapels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_mapel_kelas');
            $table->string('hari');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            // $table->boolean('status');
            $table->timestamps();

            $table->foreign('id_mapel_kelas')->references('id')->on('mapel_kelas')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_mapels');
    }
};

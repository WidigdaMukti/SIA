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
        Schema::create('orang_tuas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nik_siswa');
            $table->integer('nik_ayah')->nullable();
            $table->string('nama_lengkap_ayah')->nullable();
            $table->string('tempat_lahir_ayah')->nullable();
            $table->date('tanggal_lahir_ayah')->nullable();
            $table->string('agama_ayah')->nullable();
            $table->string('kewarganegaraan_ayah')->nullable();
            $table->string('pendidikan_terakhir_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->integer('gaji_perbulan_ayah')->nullable();
            $table->text('alamat_kantor_ayah')->nullable();
            $table->text('alamat_rumah_ayah')->nullable();
            $table->bigInteger('no_hp_ayah')->nullable();
            $table->integer('nik_wali')->nullable();
            $table->string('nama_lengkap_wali')->nullable();
            $table->string('tempat_lahir_wali')->nullable();
            $table->date('tanggal_lahir_wali')->nullable();
            $table->string('agama_wali')->nullable();
            $table->string('kewarganegaraan_wali')->nullable();
            $table->string('pendidikan_terakhir_wali')->nullable();
            $table->string('pekerjaan_wali')->nullable();
            $table->integer('gaji_wali_perbulan')->nullable();
            $table->text('alamat_kantor_wali')->nullable();
            $table->text('alamat_rumah_wali')->nullable();
            $table->bigInteger('no_hp_wali')->nullable();
            $table->integer('nik_ibu')->nullable();
            $table->string('nama_lengkap_ibu')->nullable();
            $table->string('tempat_lahir_ibu')->nullable();
            $table->date('tanggal_lahir_ibu')->nullable();
            $table->string('agama_ibu')->nullable();
            $table->string('kewarganegaraan_ibu')->nullable();
            $table->string('pendidikan_terakhir_ibu')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->integer('gaji_ibu_perbulan')->nullable();
            $table->text('alamat_kantor_ibu')->nullable();
            $table->text('alamat_rumah_ibu')->nullable();
            $table->bigInteger('no_hp_ibu')->nullable();
            $table->timestamps();

            $table->foreign('nik_siswa')->references('nik_siswa')->on('siswas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orang_tuas');
    }
};

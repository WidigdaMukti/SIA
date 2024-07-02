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
        Schema::create('ppdbs', function (Blueprint $table) {
            $table->id();
            $table->string('status')->default('baru');
            $table->string('nama_lengkap');
            $table->bigInteger('nik');
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('agama');
            $table->string('kewarganegaraan');
            $table->integer('anak_ke');
            $table->integer('jumlah_saudara_kandung');
            $table->integer('jumlah_saudara_tiri')->nullable();
            $table->integer('jumlah_saudara_angkat')->nullable();
            $table->string('bahasa_sehari_hari')->default('Indonesia');
            $table->float('berat_badan');
            $table->float('tinggi_badan');
            $table->string('golongan_darah');
            $table->text('alamat');
            $table->string('nomor_telepon');
            $table->string('bertempat_tinggal')->nullable();
            $table->string('masuk_sekolah_sebagai')->nullable();
            $table->string('asal_anak')->nullable();
            $table->string('nama_tk')->nullable();
            $table->string('nomor_tahun_surat_keterangan')->nullable();
            $table->integer('lama_belajar')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('tempat_lahir_ayah')->nullable();
            $table->date('tanggal_lahir_ayah')->nullable();
            $table->string('agama_ayah')->nullable();
            $table->string('kewarganegaraan_ayah')->nullable();
            $table->string('pendidikan_terakhir_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->text('gaji_perbulan_ayah')->nullable();
            $table->text('alamat_rumah_ayah')->nullable();
            $table->text('alamat_kantor_ayah')->nullable();
            $table->text('nomor_telepon_hp_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('tempat_lahir_ibu')->nullable();
            $table->date('tanggal_lahir_ibu')->nullable();
            $table->string('agama_ibu')->nullable();
            $table->string('kewarganegaraan_ibu')->nullable();
            $table->string('pendidikan_terakhir_ibu')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->text('gaji_perbulan_ibu')->nullable();
            $table->text('alamat_rumah_ibu')->nullable();
            $table->text('alamat_kantor_ibu')->nullable();
            $table->text('nomor_telepon_hp_ibu')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ppdbs');
    }
};
